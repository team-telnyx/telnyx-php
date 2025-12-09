<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IPConnections\InboundIP\AniNumberFormat;
use Telnyx\IPConnections\InboundIP\DefaultRoutingMethod;
use Telnyx\IPConnections\InboundIP\DnisNumberFormat;
use Telnyx\IPConnections\InboundIP\SipRegion;
use Telnyx\IPConnections\InboundIP\SipSubdomainReceiveSettings;

/**
 * @phpstan-type InboundIPShape = array{
 *   aniNumberFormat?: value-of<AniNumberFormat>|null,
 *   channelLimit?: int|null,
 *   codecs?: list<string>|null,
 *   defaultPrimaryIPID?: string|null,
 *   defaultRoutingMethod?: value-of<DefaultRoutingMethod>|null,
 *   defaultSecondaryIPID?: string|null,
 *   defaultTertiaryIPID?: string|null,
 *   dnisNumberFormat?: value-of<DnisNumberFormat>|null,
 *   generateRingbackTone?: bool|null,
 *   isupHeadersEnabled?: bool|null,
 *   prackEnabled?: bool|null,
 *   shakenStirEnabled?: bool|null,
 *   sipCompactHeadersEnabled?: bool|null,
 *   sipRegion?: value-of<SipRegion>|null,
 *   sipSubdomain?: string|null,
 *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
 *   timeout1xxSecs?: int|null,
 *   timeout2xxSecs?: int|null,
 * }
 */
final class InboundIP implements BaseModel
{
    /** @use SdkModel<InboundIPShape> */
    use SdkModel;

    /**
     * This setting allows you to set the format with which the caller's number (ANI) is sent for inbound phone calls.
     *
     * @var value-of<AniNumberFormat>|null $aniNumberFormat
     */
    #[Optional('ani_number_format', enum: AniNumberFormat::class)]
    public ?string $aniNumberFormat;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

    /**
     * Defines the list of codecs that Telnyx will send for inbound calls to a specific number on your portal account, in priority order. This only works when the Connection the number is assigned to uses Media Handling mode: default. OPUS and H.264 codecs are available only when using TCP or TLS transport for SIP.
     *
     * @var list<string>|null $codecs
     */
    #[Optional(list: 'string')]
    public ?array $codecs;

    /**
     * The default primary IP to use for the number. Only settable if the connection is
     *               of IP authentication type. Value must be the ID of an authorized IP set on the connection.
     */
    #[Optional('default_primary_ip_id')]
    public ?string $defaultPrimaryIPID;

    /**
     * Default routing method to be used when a number is associated with the connection. Must be one of the routing method types or left blank, other values are not allowed.
     *
     * @var value-of<DefaultRoutingMethod>|null $defaultRoutingMethod
     */
    #[Optional('default_routing_method', enum: DefaultRoutingMethod::class)]
    public ?string $defaultRoutingMethod;

    /**
     * The default secondary IP to use for the number. Only settable if the connection is
     *               of IP authentication type. Value must be the ID of an authorized IP set on the connection.
     */
    #[Optional('default_secondary_ip_id')]
    public ?string $defaultSecondaryIPID;

    /**
     * The default tertiary IP to use for the number. Only settable if the connection is
     *               of IP authentication type. Value must be the ID of an authorized IP set on the connection.
     */
    #[Optional('default_tertiary_ip_id')]
    public ?string $defaultTertiaryIPID;

    /** @var value-of<DnisNumberFormat>|null $dnisNumberFormat */
    #[Optional('dnis_number_format', enum: DnisNumberFormat::class)]
    public ?string $dnisNumberFormat;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Optional('generate_ringback_tone')]
    public ?bool $generateRingbackTone;

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    #[Optional('isup_headers_enabled')]
    public ?bool $isupHeadersEnabled;

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    #[Optional('prack_enabled')]
    public ?bool $prackEnabled;

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    #[Optional('shaken_stir_enabled')]
    public ?bool $shakenStirEnabled;

    /**
     * Defaults to true.
     */
    #[Optional('sip_compact_headers_enabled')]
    public ?bool $sipCompactHeadersEnabled;

    /**
     * Selects which `sip_region` to receive inbound calls from. If null, the default region (US) will be used.
     *
     * @var value-of<SipRegion>|null $sipRegion
     */
    #[Optional('sip_region', enum: SipRegion::class)]
    public ?string $sipRegion;

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

    /**
     * Time(sec) before aborting if connection is not made.
     */
    #[Optional('timeout_1xx_secs')]
    public ?int $timeout1xxSecs;

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    #[Optional('timeout_2xx_secs')]
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
        ?string $defaultPrimaryIPID = null,
        DefaultRoutingMethod|string|null $defaultRoutingMethod = null,
        ?string $defaultSecondaryIPID = null,
        ?string $defaultTertiaryIPID = null,
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
        null !== $channelLimit && $obj['channelLimit'] = $channelLimit;
        null !== $codecs && $obj['codecs'] = $codecs;
        null !== $defaultPrimaryIPID && $obj['defaultPrimaryIPID'] = $defaultPrimaryIPID;
        null !== $defaultRoutingMethod && $obj['defaultRoutingMethod'] = $defaultRoutingMethod;
        null !== $defaultSecondaryIPID && $obj['defaultSecondaryIPID'] = $defaultSecondaryIPID;
        null !== $defaultTertiaryIPID && $obj['defaultTertiaryIPID'] = $defaultTertiaryIPID;
        null !== $dnisNumberFormat && $obj['dnisNumberFormat'] = $dnisNumberFormat;
        null !== $generateRingbackTone && $obj['generateRingbackTone'] = $generateRingbackTone;
        null !== $isupHeadersEnabled && $obj['isupHeadersEnabled'] = $isupHeadersEnabled;
        null !== $prackEnabled && $obj['prackEnabled'] = $prackEnabled;
        null !== $shakenStirEnabled && $obj['shakenStirEnabled'] = $shakenStirEnabled;
        null !== $sipCompactHeadersEnabled && $obj['sipCompactHeadersEnabled'] = $sipCompactHeadersEnabled;
        null !== $sipRegion && $obj['sipRegion'] = $sipRegion;
        null !== $sipSubdomain && $obj['sipSubdomain'] = $sipSubdomain;
        null !== $sipSubdomainReceiveSettings && $obj['sipSubdomainReceiveSettings'] = $sipSubdomainReceiveSettings;
        null !== $timeout1xxSecs && $obj['timeout1xxSecs'] = $timeout1xxSecs;
        null !== $timeout2xxSecs && $obj['timeout2xxSecs'] = $timeout2xxSecs;

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
        $obj['channelLimit'] = $channelLimit;

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
     * The default primary IP to use for the number. Only settable if the connection is
     *               of IP authentication type. Value must be the ID of an authorized IP set on the connection.
     */
    public function withDefaultPrimaryIpid(string $defaultPrimaryIPID): self
    {
        $obj = clone $this;
        $obj['defaultPrimaryIPID'] = $defaultPrimaryIPID;

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
     * The default secondary IP to use for the number. Only settable if the connection is
     *               of IP authentication type. Value must be the ID of an authorized IP set on the connection.
     */
    public function withDefaultSecondaryIpid(string $defaultSecondaryIPID): self
    {
        $obj = clone $this;
        $obj['defaultSecondaryIPID'] = $defaultSecondaryIPID;

        return $obj;
    }

    /**
     * The default tertiary IP to use for the number. Only settable if the connection is
     *               of IP authentication type. Value must be the ID of an authorized IP set on the connection.
     */
    public function withDefaultTertiaryIpid(string $defaultTertiaryIPID): self
    {
        $obj = clone $this;
        $obj['defaultTertiaryIPID'] = $defaultTertiaryIPID;

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
        $obj['generateRingbackTone'] = $generateRingbackTone;

        return $obj;
    }

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    public function withIsupHeadersEnabled(bool $isupHeadersEnabled): self
    {
        $obj = clone $this;
        $obj['isupHeadersEnabled'] = $isupHeadersEnabled;

        return $obj;
    }

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    public function withPrackEnabled(bool $prackEnabled): self
    {
        $obj = clone $this;
        $obj['prackEnabled'] = $prackEnabled;

        return $obj;
    }

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    public function withShakenStirEnabled(bool $shakenStirEnabled): self
    {
        $obj = clone $this;
        $obj['shakenStirEnabled'] = $shakenStirEnabled;

        return $obj;
    }

    /**
     * Defaults to true.
     */
    public function withSipCompactHeadersEnabled(
        bool $sipCompactHeadersEnabled
    ): self {
        $obj = clone $this;
        $obj['sipCompactHeadersEnabled'] = $sipCompactHeadersEnabled;

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
        $obj['sipSubdomain'] = $sipSubdomain;

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
        $obj['timeout1xxSecs'] = $timeout1xxSecs;

        return $obj;
    }

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    public function withTimeout2xxSecs(int $timeout2xxSecs): self
    {
        $obj = clone $this;
        $obj['timeout2xxSecs'] = $timeout2xxSecs;

        return $obj;
    }
}
