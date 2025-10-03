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
 * @phpstan-type inbound_alias = array{
 *   aniNumberFormat?: value-of<AniNumberFormat>,
 *   channelLimit?: int,
 *   codecs?: list<string>,
 *   defaultRoutingMethod?: value-of<DefaultRoutingMethod>,
 *   dnisNumberFormat?: value-of<DnisNumberFormat>,
 *   generateRingbackTone?: bool,
 *   isupHeadersEnabled?: bool,
 *   prackEnabled?: bool,
 *   shakenStirEnabled?: bool,
 *   sipCompactHeadersEnabled?: bool,
 *   sipRegion?: value-of<SipRegion>,
 *   sipSubdomain?: string,
 *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>,
 *   timeout1xxSecs?: int,
 *   timeout2xxSecs?: int,
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<inbound_alias> */
    use SdkModel;

    /**
     * This setting allows you to set the format with which the caller's number (ANI) is sent for inbound phone calls.
     *
     * @var value-of<AniNumberFormat>|null $aniNumberFormat
     */
    #[Api('ani_number_format', enum: AniNumberFormat::class, optional: true)]
    public ?string $aniNumberFormat;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Api('channel_limit', optional: true)]
    public ?int $channelLimit;

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
     * @var value-of<DefaultRoutingMethod>|null $defaultRoutingMethod
     */
    #[Api(
        'default_routing_method',
        enum: DefaultRoutingMethod::class,
        optional: true
    )]
    public ?string $defaultRoutingMethod;

    /** @var value-of<DnisNumberFormat>|null $dnisNumberFormat */
    #[Api('dnis_number_format', enum: DnisNumberFormat::class, optional: true)]
    public ?string $dnisNumberFormat;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Api('generate_ringback_tone', optional: true)]
    public ?bool $generateRingbackTone;

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    #[Api('isup_headers_enabled', optional: true)]
    public ?bool $isupHeadersEnabled;

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    #[Api('prack_enabled', optional: true)]
    public ?bool $prackEnabled;

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    #[Api('shaken_stir_enabled', optional: true)]
    public ?bool $shakenStirEnabled;

    /**
     * Defaults to true.
     */
    #[Api('sip_compact_headers_enabled', optional: true)]
    public ?bool $sipCompactHeadersEnabled;

    /**
     * Selects which `sip_region` to receive inbound calls from. If null, the default region (US) will be used.
     *
     * @var value-of<SipRegion>|null $sipRegion
     */
    #[Api('sip_region', enum: SipRegion::class, optional: true)]
    public ?string $sipRegion;

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

    /**
     * Time(sec) before aborting if connection is not made.
     */
    #[Api('timeout_1xx_secs', optional: true)]
    public ?int $timeout1xxSecs;

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    #[Api('timeout_2xx_secs', optional: true)]
    public ?int $timeout2xxSecs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AniNumberFormat|value-of<AniNumberFormat> $aniNumberFormat
     * @param list<string> $codecs
     * @param DefaultRoutingMethod|value-of<DefaultRoutingMethod> $defaultRoutingMethod
     * @param DnisNumberFormat|value-of<DnisNumberFormat> $dnisNumberFormat
     * @param SipRegion|value-of<SipRegion> $sipRegion
     * @param SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings> $sipSubdomainReceiveSettings
     */
    public static function with(
        AniNumberFormat|string|null $aniNumberFormat = null,
        ?int $channelLimit = null,
        ?array $codecs = null,
        DefaultRoutingMethod|string|null $defaultRoutingMethod = null,
        DnisNumberFormat|string|null $dnisNumberFormat = null,
        ?bool $generateRingbackTone = null,
        ?bool $isupHeadersEnabled = null,
        ?bool $prackEnabled = null,
        ?bool $shakenStirEnabled = null,
        ?bool $sipCompactHeadersEnabled = null,
        SipRegion|string|null $sipRegion = null,
        ?string $sipSubdomain = null,
        SipSubdomainReceiveSettings|string|null $sipSubdomainReceiveSettings = null,
        ?int $timeout1xxSecs = null,
        ?int $timeout2xxSecs = null,
    ): self {
        $obj = new self;

        null !== $aniNumberFormat && $obj['aniNumberFormat'] = $aniNumberFormat;
        null !== $channelLimit && $obj->channelLimit = $channelLimit;
        null !== $codecs && $obj->codecs = $codecs;
        null !== $defaultRoutingMethod && $obj['defaultRoutingMethod'] = $defaultRoutingMethod;
        null !== $dnisNumberFormat && $obj['dnisNumberFormat'] = $dnisNumberFormat;
        null !== $generateRingbackTone && $obj->generateRingbackTone = $generateRingbackTone;
        null !== $isupHeadersEnabled && $obj->isupHeadersEnabled = $isupHeadersEnabled;
        null !== $prackEnabled && $obj->prackEnabled = $prackEnabled;
        null !== $shakenStirEnabled && $obj->shakenStirEnabled = $shakenStirEnabled;
        null !== $sipCompactHeadersEnabled && $obj->sipCompactHeadersEnabled = $sipCompactHeadersEnabled;
        null !== $sipRegion && $obj['sipRegion'] = $sipRegion;
        null !== $sipSubdomain && $obj->sipSubdomain = $sipSubdomain;
        null !== $sipSubdomainReceiveSettings && $obj['sipSubdomainReceiveSettings'] = $sipSubdomainReceiveSettings;
        null !== $timeout1xxSecs && $obj->timeout1xxSecs = $timeout1xxSecs;
        null !== $timeout2xxSecs && $obj->timeout2xxSecs = $timeout2xxSecs;

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
        $obj['aniNumberFormat'] = $aniNumberFormat;

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
     * Defines the list of codecs that Telnyx will send for inbound calls to a specific number on your portal account, in priority order. This only works when the Connection the number is assigned to uses Media Handling mode: default. OPUS and H.264 codecs are available only when using TCP or TLS transport for SIP.
     *
     * @param list<string> $codecs
     */
    public function withCodecs(array $codecs): self
    {
        $obj = clone $this;
        $obj->codecs = $codecs;

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
        $obj['defaultRoutingMethod'] = $defaultRoutingMethod;

        return $obj;
    }

    /**
     * @param DnisNumberFormat|value-of<DnisNumberFormat> $dnisNumberFormat
     */
    public function withDnisNumberFormat(
        DnisNumberFormat|string $dnisNumberFormat
    ): self {
        $obj = clone $this;
        $obj['dnisNumberFormat'] = $dnisNumberFormat;

        return $obj;
    }

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    public function withGenerateRingbackTone(bool $generateRingbackTone): self
    {
        $obj = clone $this;
        $obj->generateRingbackTone = $generateRingbackTone;

        return $obj;
    }

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    public function withIsupHeadersEnabled(bool $isupHeadersEnabled): self
    {
        $obj = clone $this;
        $obj->isupHeadersEnabled = $isupHeadersEnabled;

        return $obj;
    }

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    public function withPrackEnabled(bool $prackEnabled): self
    {
        $obj = clone $this;
        $obj->prackEnabled = $prackEnabled;

        return $obj;
    }

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    public function withShakenStirEnabled(bool $shakenStirEnabled): self
    {
        $obj = clone $this;
        $obj->shakenStirEnabled = $shakenStirEnabled;

        return $obj;
    }

    /**
     * Defaults to true.
     */
    public function withSipCompactHeadersEnabled(
        bool $sipCompactHeadersEnabled
    ): self {
        $obj = clone $this;
        $obj->sipCompactHeadersEnabled = $sipCompactHeadersEnabled;

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
        $obj['sipRegion'] = $sipRegion;

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
        $obj['sipSubdomainReceiveSettings'] = $sipSubdomainReceiveSettings;

        return $obj;
    }

    /**
     * Time(sec) before aborting if connection is not made.
     */
    public function withTimeout1xxSecs(int $timeout1xxSecs): self
    {
        $obj = clone $this;
        $obj->timeout1xxSecs = $timeout1xxSecs;

        return $obj;
    }

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    public function withTimeout2xxSecs(int $timeout2xxSecs): self
    {
        $obj = clone $this;
        $obj->timeout2xxSecs = $timeout2xxSecs;

        return $obj;
    }
}
