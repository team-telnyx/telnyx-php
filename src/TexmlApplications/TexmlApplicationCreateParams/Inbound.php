<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound\SipSubdomainReceiveSettings;

/**
 * @phpstan-type InboundShape = array{
 *   channelLimit?: int|null,
 *   shakenStirEnabled?: bool|null,
 *   sipSubdomain?: string|null,
 *   sipSubdomainReceiveSettings?: null|SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings>,
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

    /**
     * When enabled Telnyx will include Shaken/Stir data in the Webhook for new inbound calls.
     */
    #[Optional('shaken_stir_enabled')]
    public ?bool $shakenStirEnabled;

    /**
     * Specifies a subdomain that can be used to receive Inbound calls to a Connection, in the same way a phone number is used, from a SIP endpoint. Example: the subdomain "example.sip.telnyx.com" can be called from any SIP endpoint by using the SIP URI "sip:@example.sip.telnyx.com" where the user part can be any alphanumeric value. Please note TLS encrypted calls are not allowed for subdomain calls.
     */
    #[Optional('sip_subdomain')]
    public ?string $sipSubdomain;

    /**
     * This option can be enabled to receive calls from: "Anyone" (any SIP endpoint in the public Internet) or "Only my connections" (any connection assigned to the same Telnyx user).
     *
     * @var value-of<SipSubdomainReceiveSettings>|null $sipSubdomainReceiveSettings
     */
    #[Optional(
        'sip_subdomain_receive_settings',
        enum: SipSubdomainReceiveSettings::class
    )]
    public ?string $sipSubdomainReceiveSettings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings> $sipSubdomainReceiveSettings
     */
    public static function with(
        ?int $channelLimit = null,
        ?bool $shakenStirEnabled = null,
        ?string $sipSubdomain = null,
        SipSubdomainReceiveSettings|string|null $sipSubdomainReceiveSettings = null,
    ): self {
        $self = new self;

        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $shakenStirEnabled && $self['shakenStirEnabled'] = $shakenStirEnabled;
        null !== $sipSubdomain && $self['sipSubdomain'] = $sipSubdomain;
        null !== $sipSubdomainReceiveSettings && $self['sipSubdomainReceiveSettings'] = $sipSubdomainReceiveSettings;

        return $self;
    }

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }

    /**
     * When enabled Telnyx will include Shaken/Stir data in the Webhook for new inbound calls.
     */
    public function withShakenStirEnabled(bool $shakenStirEnabled): self
    {
        $self = clone $this;
        $self['shakenStirEnabled'] = $shakenStirEnabled;

        return $self;
    }

    /**
     * Specifies a subdomain that can be used to receive Inbound calls to a Connection, in the same way a phone number is used, from a SIP endpoint. Example: the subdomain "example.sip.telnyx.com" can be called from any SIP endpoint by using the SIP URI "sip:@example.sip.telnyx.com" where the user part can be any alphanumeric value. Please note TLS encrypted calls are not allowed for subdomain calls.
     */
    public function withSipSubdomain(string $sipSubdomain): self
    {
        $self = clone $this;
        $self['sipSubdomain'] = $sipSubdomain;

        return $self;
    }

    /**
     * This option can be enabled to receive calls from: "Anyone" (any SIP endpoint in the public Internet) or "Only my connections" (any connection assigned to the same Telnyx user).
     *
     * @param SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings> $sipSubdomainReceiveSettings
     */
    public function withSipSubdomainReceiveSettings(
        SipSubdomainReceiveSettings|string $sipSubdomainReceiveSettings
    ): self {
        $self = clone $this;
        $self['sipSubdomainReceiveSettings'] = $sipSubdomainReceiveSettings;

        return $self;
    }
}
