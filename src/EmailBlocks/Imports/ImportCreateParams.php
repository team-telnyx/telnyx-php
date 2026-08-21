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
 * `pending → processing → completed | failed`. `block_ttl_days`
 * applies only to imported `manual_block` rows; other reasons get
 * `expires_at: nil`. Provider is auto-detected from the CSV header
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
