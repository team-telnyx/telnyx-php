<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplicationInbound\SipSubdomainReceiveSettings;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type call_control_application_inbound = array{
 *   channelLimit?: int,
 *   shakenStirEnabled?: bool,
 *   sipSubdomain?: string,
 *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>,
 * }
 */
final class CallControlApplicationInbound implements BaseModel
{
    /** @use SdkModel<call_control_application_inbound> */
    use SdkModel;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Api('channel_limit', optional: true)]
    public ?int $channelLimit;

    /**
     * When enabled Telnyx will include Shaken/Stir data in the Webhook for new inbound calls.
     */
    #[Api('shaken_stir_enabled', optional: true)]
    public ?bool $shakenStirEnabled;

    /**
     * Specifies a subdomain that can be used to receive Inbound calls to a Connection, in the same way a phone number is used, from a SIP endpoint. Example: the subdomain "example.sip.telnyx.com" can be called from any SIP endpoint by using the SIP URI "sip:@example.sip.telnyx.com" where the user part can be any alphanumeric value. Please note TLS encrypted calls are not allowed for subdomain calls.
     */
    #[Api('sip_subdomain', optional: true)]
    public ?string $sipSubdomain;

    /**
     * This option can be enabled to receive calls from: "Anyone" (any SIP endpoint in the public Internet) or "Only my connections" (any connection assigned to the same Telnyx user).
     *
     * @var value-of<SipSubdomainReceiveSettings>|null $sipSubdomainReceiveSettings
     */
    #[Api(
        'sip_subdomain_receive_settings',
        enum: SipSubdomainReceiveSettings::class,
        optional: true,
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
        $obj = new self;

        null !== $channelLimit && $obj->channelLimit = $channelLimit;
        null !== $shakenStirEnabled && $obj->shakenStirEnabled = $shakenStirEnabled;
        null !== $sipSubdomain && $obj->sipSubdomain = $sipSubdomain;
        null !== $sipSubdomainReceiveSettings && $obj->sipSubdomainReceiveSettings = $sipSubdomainReceiveSettings instanceof SipSubdomainReceiveSettings ? $sipSubdomainReceiveSettings->value : $sipSubdomainReceiveSettings;

        return $obj;
    }

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj->channelLimit = $channelLimit;

        return $obj;
    }

    /**
     * When enabled Telnyx will include Shaken/Stir data in the Webhook for new inbound calls.
     */
    public function withShakenStirEnabled(bool $shakenStirEnabled): self
    {
        $obj = clone $this;
        $obj->shakenStirEnabled = $shakenStirEnabled;

        return $obj;
    }

    /**
     * Specifies a subdomain that can be used to receive Inbound calls to a Connection, in the same way a phone number is used, from a SIP endpoint. Example: the subdomain "example.sip.telnyx.com" can be called from any SIP endpoint by using the SIP URI "sip:@example.sip.telnyx.com" where the user part can be any alphanumeric value. Please note TLS encrypted calls are not allowed for subdomain calls.
     */
    public function withSipSubdomain(string $sipSubdomain): self
    {
        $obj = clone $this;
        $obj->sipSubdomain = $sipSubdomain;

        return $obj;
    }

    /**
     * This option can be enabled to receive calls from: "Anyone" (any SIP endpoint in the public Internet) or "Only my connections" (any connection assigned to the same Telnyx user).
     *
     * @param SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings> $sipSubdomainReceiveSettings
     */
    public function withSipSubdomainReceiveSettings(
        SipSubdomainReceiveSettings|string $sipSubdomainReceiveSettings
    ): self {
        $obj = clone $this;
        $obj->sipSubdomainReceiveSettings = $sipSubdomainReceiveSettings instanceof SipSubdomainReceiveSettings ? $sipSubdomainReceiveSettings->value : $sipSubdomainReceiveSettings;

        return $obj;
    }
}
