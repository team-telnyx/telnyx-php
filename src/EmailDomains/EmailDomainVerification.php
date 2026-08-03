<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDomainVerification\Dkim;
use Telnyx\EmailDomains\EmailDomainVerification\Dmarc;
use Telnyx\EmailDomains\EmailDomainVerification\Mx;
use Telnyx\EmailDomains\EmailDomainVerification\Ownership;
use Telnyx\EmailDomains\EmailDomainVerification\Spf;

/**
 * @phpstan-type EmailDomainVerificationShape = array{
 *   dkim: Dkim|value-of<Dkim>,
 *   dmarc: Dmarc|value-of<Dmarc>,
 *   mx: Mx|value-of<Mx>,
 *   ownership: Ownership|value-of<Ownership>,
 *   spf: Spf|value-of<Spf>,
 * }
 */
final class EmailDomainVerification implements BaseModel
{
    /** @use SdkModel<EmailDomainVerificationShape> */
    use SdkModel;

    /** @var value-of<Dkim> $dkim */
    #[Required(enum: Dkim::class)]
    public string $dkim;

    /** @var value-of<Dmarc> $dmarc */
    #[Required(enum: Dmarc::class)]
    public string $dmarc;

    /** @var value-of<Mx> $mx */
    #[Required(enum: Mx::class)]
    public string $mx;

    /** @var value-of<Ownership> $ownership */
    #[Required(enum: Ownership::class)]
    public string $ownership;

    /** @var value-of<Spf> $spf */
    #[Required(enum: Spf::class)]
    public string $spf;

    /**
     * `new EmailDomainVerification()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailDomainVerification::with(
     *   dkim: ..., dmarc: ..., mx: ..., ownership: ..., spf: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailDomainVerification)
     *   ->withDkim(...)
     *   ->withDmarc(...)
     *   ->withMx(...)
     *   ->withOwnership(...)
     *   ->withSpf(...)
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
     *
     * @param Dkim|value-of<Dkim> $dkim
     * @param Dmarc|value-of<Dmarc> $dmarc
     * @param Mx|value-of<Mx> $mx
     * @param Ownership|value-of<Ownership> $ownership
     * @param Spf|value-of<Spf> $spf
     */
    public static function with(
        Dkim|string $dkim,
        Dmarc|string $dmarc,
        Mx|string $mx,
        Ownership|string $ownership,
        Spf|string $spf,
    ): self {
        $self = new self;

        $self['dkim'] = $dkim;
        $self['dmarc'] = $dmarc;
        $self['mx'] = $mx;
        $self['ownership'] = $ownership;
        $self['spf'] = $spf;

        return $self;
    }

    /**
     * @param Dkim|value-of<Dkim> $dkim
     */
    public function withDkim(Dkim|string $dkim): self
    {
        $self = clone $this;
        $self['dkim'] = $dkim;

        return $self;
    }

    /**
     * @param Dmarc|value-of<Dmarc> $dmarc
     */
    public function withDmarc(Dmarc|string $dmarc): self
    {
        $self = clone $this;
        $self['dmarc'] = $dmarc;

        return $self;
    }

    /**
     * @param Mx|value-of<Mx> $mx
     */
    public function withMx(Mx|string $mx): self
    {
        $self = clone $this;
        $self['mx'] = $mx;

        return $self;
    }

    /**
     * @param Ownership|value-of<Ownership> $ownership
     */
    public function withOwnership(Ownership|string $ownership): self
    {
        $self = clone $this;
        $self['ownership'] = $ownership;

        return $self;
    }

    /**
     * @param Spf|value-of<Spf> $spf
     */
    public function withSpf(Spf|string $spf): self
    {
        $self = clone $this;
        $self['spf'] = $spf;

        return $self;
    }
}
