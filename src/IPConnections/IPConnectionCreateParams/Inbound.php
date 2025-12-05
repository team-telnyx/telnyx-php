<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\IPConnectionCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\AniNumberFormat;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\DefaultRoutingMethod;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\DnisNumberFormat;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\SipRegion;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\SipSubdomainReceiveSettings;

/**
 * @phpstan-type InboundShape = array{
 *   ani_number_format?: value-of<AniNumberFormat>|null,
 *   channel_limit?: int|null,
 *   codecs?: list<string>|null,
 *   default_routing_method?: value-of<DefaultRoutingMethod>|null,
 *   dnis_number_format?: value-of<DnisNumberFormat>|null,
 *   generate_ringback_tone?: bool|null,
 *   isup_headers_enabled?: bool|null,
 *   prack_enabled?: bool|null,
 *   shaken_stir_enabled?: bool|null,
 *   sip_compact_headers_enabled?: bool|null,
 *   sip_region?: value-of<SipRegion>|null,
 *   sip_subdomain?: string|null,
 *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
 *   timeout_1xx_secs?: int|null,
 *   timeout_2xx_secs?: int|null,
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * This setting allows you to set the format with which the caller's number (ANI) is sent for inbound phone calls.
     *
     * @var value-of<AniNumberFormat>|null $ani_number_format
     */
    #[Api(enum: AniNumberFormat::class, optional: true)]
    public ?string $ani_number_format;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Api(optional: true)]
    public ?int $channel_limit;

    /**
     * Defines the list of codecs that Telnyx will send for inbound calls to a specific number on your portal account, in priority order. This only works when the Connection the number is assigned to uses Media Handling mode: default. OPUS and H.264 codecs are available only when using TCP or TLS transport for SIP.
     *
     * @var list<string>|null $codecs
     */
    #[Api(list: 'string', optional: true)]
    public ?array $codecs;

    /**
     * Default routing method to be used when a number is associated with the connection. Must be one of the routing method types or left blank, other values are not allowed.
     *
     * @var value-of<DefaultRoutingMethod>|null $default_routing_method
     */
    #[Api(enum: DefaultRoutingMethod::class, optional: true)]
    public ?string $default_routing_method;

    /** @var value-of<DnisNumberFormat>|null $dnis_number_format */
    #[Api(enum: DnisNumberFormat::class, optional: true)]
    public ?string $dnis_number_format;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Api(optional: true)]
    public ?bool $generate_ringback_tone;

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    #[Api(optional: true)]
    public ?bool $isup_headers_enabled;

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    #[Api(optional: true)]
    public ?bool $prack_enabled;

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    #[Api(optional: true)]
    public ?bool $shaken_stir_enabled;

    /**
     * Defaults to true.
     */
    #[Api(optional: true)]
    public ?bool $sip_compact_headers_enabled;

    /**
     * Selects which `sip_region` to receive inbound calls from. If null, the default region (US) will be used.
     *
     * @var value-of<SipRegion>|null $sip_region
     */
    #[Api(enum: SipRegion::class, optional: true)]
    public ?string $sip_region;

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

    /**
     * Time(sec) before aborting if connection is not made.
     */
    #[Api(optional: true)]
    public ?int $timeout_1xx_secs;

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    #[Api(optional: true)]
    public ?int $timeout_2xx_secs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AniNumberFormat|value-of<AniNumberFormat> $ani_number_format
     * @param list<string> $codecs
     * @param DefaultRoutingMethod|value-of<DefaultRoutingMethod> $default_routing_method
     * @param DnisNumberFormat|value-of<DnisNumberFormat> $dnis_number_format
     * @param SipRegion|value-of<SipRegion> $sip_region
     * @param SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings> $sip_subdomain_receive_settings
     */
    public static function with(
        AniNumberFormat|string|null $ani_number_format = null,
        ?int $channel_limit = null,
        ?array $codecs = null,
        DefaultRoutingMethod|string|null $default_routing_method = null,
        DnisNumberFormat|string|null $dnis_number_format = null,
        ?bool $generate_ringback_tone = null,
        ?bool $isup_headers_enabled = null,
        ?bool $prack_enabled = null,
        ?bool $shaken_stir_enabled = null,
        ?bool $sip_compact_headers_enabled = null,
        SipRegion|string|null $sip_region = null,
        ?string $sip_subdomain = null,
        SipSubdomainReceiveSettings|string|null $sip_subdomain_receive_settings = null,
        ?int $timeout_1xx_secs = null,
        ?int $timeout_2xx_secs = null,
    ): self {
        $obj = new self;

        null !== $ani_number_format && $obj['ani_number_format'] = $ani_number_format;
        null !== $channel_limit && $obj['channel_limit'] = $channel_limit;
        null !== $codecs && $obj['codecs'] = $codecs;
        null !== $default_routing_method && $obj['default_routing_method'] = $default_routing_method;
        null !== $dnis_number_format && $obj['dnis_number_format'] = $dnis_number_format;
        null !== $generate_ringback_tone && $obj['generate_ringback_tone'] = $generate_ringback_tone;
        null !== $isup_headers_enabled && $obj['isup_headers_enabled'] = $isup_headers_enabled;
        null !== $prack_enabled && $obj['prack_enabled'] = $prack_enabled;
        null !== $shaken_stir_enabled && $obj['shaken_stir_enabled'] = $shaken_stir_enabled;
        null !== $sip_compact_headers_enabled && $obj['sip_compact_headers_enabled'] = $sip_compact_headers_enabled;
        null !== $sip_region && $obj['sip_region'] = $sip_region;
        null !== $sip_subdomain && $obj['sip_subdomain'] = $sip_subdomain;
        null !== $sip_subdomain_receive_settings && $obj['sip_subdomain_receive_settings'] = $sip_subdomain_receive_settings;
        null !== $timeout_1xx_secs && $obj['timeout_1xx_secs'] = $timeout_1xx_secs;
        null !== $timeout_2xx_secs && $obj['timeout_2xx_secs'] = $timeout_2xx_secs;

        return $obj;
    }

    /**
     * This setting allows you to set the format with which the caller's number (ANI) is sent for inbound phone calls.
     *
     * @param AniNumberFormat|value-of<AniNumberFormat> $aniNumberFormat
     */
    public function withAniNumberFormat(
        AniNumberFormat|string $aniNumberFormat
    ): self {
        $obj = clone $this;
        $obj['ani_number_format'] = $aniNumberFormat;

        return $obj;
    }

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channel_limit'] = $channelLimit;

        return $obj;
    }

    /**
     * Defines the list of codecs that Telnyx will send for inbound calls to a specific number on your portal account, in priority order. This only works when the Connection the number is assigned to uses Media Handling mode: default. OPUS and H.264 codecs are available only when using TCP or TLS transport for SIP.
     *
     * @param list<string> $codecs
     */
    public function withCodecs(array $codecs): self
    {
        $obj = clone $this;
        $obj['codecs'] = $codecs;

        return $obj;
    }

    /**
     * Default routing method to be used when a number is associated with the connection. Must be one of the routing method types or left blank, other values are not allowed.
     *
     * @param DefaultRoutingMethod|value-of<DefaultRoutingMethod> $defaultRoutingMethod
     */
    public function withDefaultRoutingMethod(
        DefaultRoutingMethod|string $defaultRoutingMethod
    ): self {
        $obj = clone $this;
        $obj['default_routing_method'] = $defaultRoutingMethod;

        return $obj;
    }

    /**
     * @param DnisNumberFormat|value-of<DnisNumberFormat> $dnisNumberFormat
     */
    public function withDnisNumberFormat(
        DnisNumberFormat|string $dnisNumberFormat
    ): self {
        $obj = clone $this;
        $obj['dnis_number_format'] = $dnisNumberFormat;

        return $obj;
    }

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    public function withGenerateRingbackTone(bool $generateRingbackTone): self
    {
        $obj = clone $this;
        $obj['generate_ringback_tone'] = $generateRingbackTone;

        return $obj;
    }

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    public function withIsupHeadersEnabled(bool $isupHeadersEnabled): self
    {
        $obj = clone $this;
        $obj['isup_headers_enabled'] = $isupHeadersEnabled;

        return $obj;
    }

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    public function withPrackEnabled(bool $prackEnabled): self
    {
        $obj = clone $this;
        $obj['prack_enabled'] = $prackEnabled;

        return $obj;
    }

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    public function withShakenStirEnabled(bool $shakenStirEnabled): self
    {
        $obj = clone $this;
        $obj['shaken_stir_enabled'] = $shakenStirEnabled;

        return $obj;
    }

    /**
     * Defaults to true.
     */
    public function withSipCompactHeadersEnabled(
        bool $sipCompactHeadersEnabled
    ): self {
        $obj = clone $this;
        $obj['sip_compact_headers_enabled'] = $sipCompactHeadersEnabled;

        return $obj;
    }

    /**
     * Selects which `sip_region` to receive inbound calls from. If null, the default region (US) will be used.
     *
     * @param SipRegion|value-of<SipRegion> $sipRegion
     */
    public function withSipRegion(SipRegion|string $sipRegion): self
    {
        $obj = clone $this;
        $obj['sip_region'] = $sipRegion;

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

    /**
     * Time(sec) before aborting if connection is not made.
     */
    public function withTimeout1xxSecs(int $timeout1xxSecs): self
    {
        $obj = clone $this;
        $obj['timeout_1xx_secs'] = $timeout1xxSecs;

        return $obj;
    }

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    public function withTimeout2xxSecs(int $timeout2xxSecs): self
    {
        $obj = clone $this;
        $obj['timeout_2xx_secs'] = $timeout2xxSecs;

        return $obj;
    }
}
