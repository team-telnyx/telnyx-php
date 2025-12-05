<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications\FaxApplication;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\FaxApplications\FaxApplication\Inbound\SipSubdomainReceiveSettings;

/**
 * @phpstan-type InboundShape = array{
 *   channel_limit?: int|null,
 *   sip_subdomain?: string|null,
 *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * When set, this will limit the number of concurrent inbound calls to phone numbers associated with this connection.
     */
    #[Api(optional: true)]
    public ?int $channel_limit;

    /**
     * Specifies a subdomain that can be used to receive Inbound calls to a Connection, in the same way a phone number is used, from a SIP endpoint. Example: the subdomain "example.sip.telnyx.com" can be called from any SIP endpoint by using the SIP URI "sip:@example.sip.telnyx.com" where the user part can be any alphanumeric value. Please note TLS encrypted calls are not allowed for subdomain calls.
     */
    #[Api(optional: true)]
    public ?string $sip_subdomain;

    /**
     * This option can be enabled to receive calls from: "Anyone" (any SIP endpoint in the public Internet) or "Only my connections" (any connection assigned to the same Telnyx user).
     *
     * @var value-of<SipSubdomainReceiveSettings>|null $sip_subdomain_receive_settings
     */
    #[Api(enum: SipSubdomainReceiveSettings::class, optional: true)]
    public ?string $sip_subdomain_receive_settings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings> $sip_subdomain_receive_settings
     */
    public static function with(
        ?int $channel_limit = null,
        ?string $sip_subdomain = null,
        SipSubdomainReceiveSettings|string|null $sip_subdomain_receive_settings = null,
    ): self {
        $obj = new self;

        null !== $channel_limit && $obj['channel_limit'] = $channel_limit;
        null !== $sip_subdomain && $obj['sip_subdomain'] = $sip_subdomain;
        null !== $sip_subdomain_receive_settings && $obj['sip_subdomain_receive_settings'] = $sip_subdomain_receive_settings;

        return $obj;
    }

    /**
     * When set, this will limit the number of concurrent inbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channel_limit'] = $channelLimit;

        return $obj;
    }

    /**
     * Specifies a subdomain that can be used to receive Inbound calls to a Connection, in the same way a phone number is used, from a SIP endpoint. Example: the subdomain "example.sip.telnyx.com" can be called from any SIP endpoint by using the SIP URI "sip:@example.sip.telnyx.com" where the user part can be any alphanumeric value. Please note TLS encrypted calls are not allowed for subdomain calls.
     */
    public function withSipSubdomain(string $sipSubdomain): self
    {
        $obj = clone $this;
        $obj['sip_subdomain'] = $sipSubdomain;

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
        $obj['sip_subdomain_receive_settings'] = $sipSubdomainReceiveSettings;

        return $obj;
    }
}
