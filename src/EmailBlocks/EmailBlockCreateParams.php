<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a suppression with `reason: manual_block` and `source: manual`.
 * Caller-supplied `reason` / `source` are **ignored**; `scope` is
 * **derived** server-side from `domain_id` / `from` and is never
 * trusted. Idempotent: if a matching row already exists (NULL-safe
 * dedupe key: account_id, scope, to, reason, domain_id, from),
 * returns the existing record with `200` (no new audit event).
 *
 * `bounce_category`, `dsn_code`, `meta`, and `group_id` are **not
 * accepted** on the public surface. Use the unsubscribe-group
 * suppression endpoint or the internal create surface for those.
 *
 * @see Telnyx\Services\EmailBlocksService::create()
 *
 * @phpstan-type EmailBlockCreateParamsShape = array{
 *   to: string,
 *   domainID?: string|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   from?: string|null,
 * }
 */
final class EmailBlockCreateParams implements BaseModel
{
    /** @use SdkModel<EmailBlockCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Recipient address (normalized: trim + lower-case).
     */
    #[Required]
    public string $to;

    /**
     * `null` ⇒ account scope.
     */
    #[Optional('domain_id', nullable: true)]
    public ?string $domainID;

    #[Optional('expires_at', nullable: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Sender address (normalized). `null` ⇒ account/domain scope.
     */
    #[Optional(nullable: true)]
    public ?string $from;

    /**
     * `new EmailBlockCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailBlockCreateParams::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailBlockCreateParams)->withTo(...)
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
        string $to,
        ?string $domainID = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
    ): self {
        $self = new self;

        $self['to'] = $to;

        null !== $domainID && $self['domainID'] = $domainID;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $from && $self['from'] = $from;

        return $self;
    }

    /**
     * Recipient address (normalized: trim + lower-case).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * `null` ⇒ account scope.
     */
    public function withDomainID(?string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Sender address (normalized). `null` ⇒ account/domain scope.
     */
    public function withFrom(?string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }
}
