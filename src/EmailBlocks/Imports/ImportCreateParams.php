<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\Imports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\FileParam;

/**
 * Accepts `multipart/form-data` with a `file` field (the CSV) and an
 * optional `block_ttl_days` (integer >0, default 30). Validates:
 *   - content ≤ 25 MiB, else `413`
 *   - row count ≤ 250 000, else `413`
 *   - header-only / all-blank / undetectable provider → `400`
 * Returns `202` with the import record (status `pending`); an Oban
 * worker (`EmailBlockImportWorker`, max_attempts 3) transitions
 * `pending → processing → completed | failed`.
 *
 * Native Telnyx exports are detected by the stable first-12-column
 * header signature (`id` … `group_id`) and are restored with their
 * original `from`, `domain_id`, `group_id`, `source`, `status`,
 * `expires_at`, plus `bounce_category`, `dsn_code`, and `meta` when
 * present (`scope` is re-derived from `domain_id`/`from`; the
 * exported `scope` cell must be a valid enum value). Lifecycle
 * changes reconcile through the same create path as the API: a row
 * already in the requested state restores its mutable backup fields
 * without a new audit event, and a real transition (e.g. tombstone
 * → active) appends the matching lifecycle event. `block_ttl_days`
 * is not applied to native rows — their exported `expires_at` is
 * preserved verbatim.
 *
 * Competitor and generic imports (SendGrid / Mailgun / SES /
 * generic) remain account-scoped (`from`, `domain_id`, `group_id`,
 * `scope` are not read) and `block_ttl_days` applies only to
 * imported `manual_block` rows; other reasons get `expires_at: nil`.
 * Provider is auto-detected from the CSV header
 * (`sendgrid` / `mailgun` / `ses` / `generic`).
 *
 * @see Telnyx\Services\EmailBlocks\ImportsService::create()
 *
 * @phpstan-type ImportCreateParamsShape = array{
 *   file: string|FileParam, blockTtlDays?: int|null
 * }
 */
final class ImportCreateParams implements BaseModel
{
    /** @use SdkModel<ImportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The CSV file (Plug.Upload). Missing/non-upload → 400.
     */
    #[Required]
    public string $file;

    /**
     * TTL for imported `manual_block` rows; other reasons get `expires_at: null`. Invalid/missing → falls back to 30.
     */
    #[Optional('block_ttl_days')]
    public ?int $blockTtlDays;

    /**
     * `new ImportCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportCreateParams::with(file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportCreateParams)->withFile(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string|FileParam $file,
        ?int $blockTtlDays = null
    ): self {
        $self = new self;

        $self['file'] = $file;

        null !== $blockTtlDays && $self['blockTtlDays'] = $blockTtlDays;

        return $self;
    }

    /**
     * The CSV file (Plug.Upload). Missing/non-upload → 400.
     */
    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * TTL for imported `manual_block` rows; other reasons get `expires_at: null`. Invalid/missing → falls back to 30.
     */
    public function withBlockTtlDays(int $blockTtlDays): self
    {
        $self = clone $this;
        $self['blockTtlDays'] = $blockTtlDays;

        return $self;
    }
}
