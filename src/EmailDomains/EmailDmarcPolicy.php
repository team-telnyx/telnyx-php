<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDmarcPolicy\P;
use Telnyx\EmailDomains\EmailDmarcPolicy\Sp;

/**
 * DMARC policy for a sending domain. Drives the recommended _dmarc.<domain> TXT record. DMARC is advisory and never blocks sending. When omitted or null, the domain uses the advisory default (v=DMARC1; p=none; rua=mailto:dmarc@telnyx.com).
 *
 * @phpstan-type EmailDmarcPolicyShape = array{
 *   p?: null|P|value-of<P>,
 *   pct?: int|null,
 *   rua?: string|null,
 *   sp?: null|Sp|value-of<Sp>,
 * }
 */
final class EmailDmarcPolicy implements BaseModel
{
    /** @use SdkModel<EmailDmarcPolicyShape> */
    use SdkModel;

    /**
     * Policy applied to messages that fail alignment.
     *
     * @var value-of<P>|null $p
     */
    #[Optional(enum: P::class)]
    public ?string $p;

    /**
     * Percentage of messages the policy applies to. Omitted from the record when 100.
     */
    #[Optional]
    public ?int $pct;

    /**
     * URI for aggregate reports. Defaults to the Telnyx address when absent; null omits it.
     */
    #[Optional(nullable: true)]
    public ?string $rua;

    /**
     * Policy for subdomains. Omitted from the record when null.
     *
     * @var value-of<Sp>|null $sp
     */
    #[Optional(enum: Sp::class, nullable: true)]
    public ?string $sp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param P|value-of<P>|null $p
     * @param Sp|value-of<Sp>|null $sp
     */
    public static function with(
        P|string|null $p = null,
        ?int $pct = null,
        ?string $rua = null,
        Sp|string|null $sp = null,
    ): self {
        $self = new self;

        null !== $p && $self['p'] = $p;
        null !== $pct && $self['pct'] = $pct;
        null !== $rua && $self['rua'] = $rua;
        null !== $sp && $self['sp'] = $sp;

        return $self;
    }

    /**
     * Policy applied to messages that fail alignment.
     *
     * @param P|value-of<P> $p
     */
    public function withP(P|string $p): self
    {
        $self = clone $this;
        $self['p'] = $p;

        return $self;
    }

    /**
     * Percentage of messages the policy applies to. Omitted from the record when 100.
     */
    public function withPct(int $pct): self
    {
        $self = clone $this;
        $self['pct'] = $pct;

        return $self;
    }

    /**
     * URI for aggregate reports. Defaults to the Telnyx address when absent; null omits it.
     */
    public function withRua(?string $rua): self
    {
        $self = clone $this;
        $self['rua'] = $rua;

        return $self;
    }

    /**
     * Policy for subdomains. Omitted from the record when null.
     *
     * @param Sp|value-of<Sp>|null $sp
     */
    public function withSp(Sp|string|null $sp): self
    {
        $self = clone $this;
        $self['sp'] = $sp;

        return $self;
    }
}
