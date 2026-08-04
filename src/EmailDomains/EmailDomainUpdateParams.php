<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an email domain.
 *
 * @see Telnyx\Services\EmailDomainsService::update()
 *
 * @phpstan-import-type EmailDmarcPolicyShape from \Telnyx\EmailDomains\EmailDmarcPolicy
 * @phpstan-import-type DomainsTrackingSettingsShape from \Telnyx\EmailDomains\DomainsTrackingSettings
 *
 * @phpstan-type EmailDomainUpdateParamsShape = array{
 *   dmarcPolicy?: null|EmailDmarcPolicy|EmailDmarcPolicyShape,
 *   inboundEnabled?: bool|null,
 *   tracking?: null|DomainsTrackingSettings|DomainsTrackingSettingsShape,
 * }
 */
final class EmailDomainUpdateParams implements BaseModel
{
    /** @use SdkModel<EmailDomainUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * DMARC policy for a sending domain. Drives the recommended _dmarc.<domain> TXT record. DMARC is advisory and never blocks sending. When omitted or null, the domain uses the advisory default (v=DMARC1; p=none; rua=mailto:dmarc@telnyx.com).
     */
    #[Optional('dmarc_policy', nullable: true)]
    public ?EmailDmarcPolicy $dmarcPolicy;

    /**
     * Enable or disable inbound routing for this domain.
     */
    #[Optional('inbound_enabled')]
    public ?bool $inboundEnabled;

    #[Optional]
    public ?DomainsTrackingSettings $tracking;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EmailDmarcPolicy|EmailDmarcPolicyShape|null $dmarcPolicy
     * @param DomainsTrackingSettings|DomainsTrackingSettingsShape|null $tracking
     */
    public static function with(
        EmailDmarcPolicy|array|null $dmarcPolicy = null,
        ?bool $inboundEnabled = null,
        DomainsTrackingSettings|array|null $tracking = null,
    ): self {
        $self = new self;

        null !== $dmarcPolicy && $self['dmarcPolicy'] = $dmarcPolicy;
        null !== $inboundEnabled && $self['inboundEnabled'] = $inboundEnabled;
        null !== $tracking && $self['tracking'] = $tracking;

        return $self;
    }

    /**
     * DMARC policy for a sending domain. Drives the recommended _dmarc.<domain> TXT record. DMARC is advisory and never blocks sending. When omitted or null, the domain uses the advisory default (v=DMARC1; p=none; rua=mailto:dmarc@telnyx.com).
     *
     * @param EmailDmarcPolicy|EmailDmarcPolicyShape|null $dmarcPolicy
     */
    public function withDmarcPolicy(
        EmailDmarcPolicy|array|null $dmarcPolicy
    ): self {
        $self = clone $this;
        $self['dmarcPolicy'] = $dmarcPolicy;

        return $self;
    }

    /**
     * Enable or disable inbound routing for this domain.
     */
    public function withInboundEnabled(bool $inboundEnabled): self
    {
        $self = clone $this;
        $self['inboundEnabled'] = $inboundEnabled;

        return $self;
    }

    /**
     * @param DomainsTrackingSettings|DomainsTrackingSettingsShape $tracking
     */
    public function withTracking(DomainsTrackingSettings|array $tracking): self
    {
        $self = clone $this;
        $self['tracking'] = $tracking;

        return $self;
    }
}
