<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\FqdnConnections\InboundFqdn\AniNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\DefaultRoutingMethod;
use Telnyx\FqdnConnections\InboundFqdn\DnisNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\SipRegion;
use Telnyx\FqdnConnections\InboundFqdn\SipSubdomainReceiveSettings;

/**
 * @phpstan-type InboundFqdnShape = array{
 *   aniNumberFormat?: value-of<AniNumberFormat>|null,
 *   channelLimit?: int|null,
 *   codecs?: list<string>|null,
 *   defaultPrimaryFqdnID?: string|null,
 *   defaultRoutingMethod?: value-of<DefaultRoutingMethod>|null,
 *   defaultSecondaryFqdnID?: string|null,
 *   defaultTertiaryFqdnID?: string|null,
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
final class InboundFqdn implements BaseModel
{
    /** @use SdkModel<InboundFqdnShape> */
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
    #[Optional('channel_limit', nullable: true)]
    public ?int $channelLimit;

    /**
     * Defines the list of codecs that Telnyx will send for inbound calls to a specific number on your portal account, in priority order. This only works when the Connection the number is assigned to uses Media Handling mode: default. OPUS and H.264 codecs are available only when using TCP or TLS transport for SIP.
     *
     * @var list<string>|null $codecs
     */
    #[Optional(list: 'string')]
    public ?array $codecs;

    /**
     * The default primary FQDN to use for the number. Only settable if the connection is
     * of FQDN type. Value must be the ID of an FQDN set on the connection.
     */
    #[Optional('default_primary_fqdn_id', nullable: true)]
    public ?string $defaultPrimaryFqdnID;

    /**
     * Default routing method to be used when a number is associated with the connection. Must be one of the routing method types or null, other values are not allowed.
     *
     * @var value-of<DefaultRoutingMethod>|null $defaultRoutingMethod
     */
    #[Optional(
        'default_routing_method',
        enum: DefaultRoutingMethod::class,
        nullable: true
    )]
    public ?string $defaultRoutingMethod;

    /**
     * The default secondary FQDN to use for the number. Only settable if the connection is
     * of FQDN type. Value must be the ID of an FQDN set on the connection.
     */
    #[Optional('default_secondary_fqdn_id', nullable: true)]
    public ?string $defaultSecondaryFqdnID;

    /**
     * The default tertiary FQDN to use for the number. Only settable if the connection is
     * of FQDN type. Value must be the ID of an FQDN set on the connection.
     */
    #[Optional('default_tertiary_fqdn_id', nullable: true)]
    public ?string $defaultTertiaryFqdnID;

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
    #[Optional('sip_subdomain', nullable: true)]
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
     * @param DefaultRoutingMethod|value-of<DefaultRoutingMethod>|null $defaultRoutingMethod
     * @param DnisNumberFormat|value-of<DnisNumberFormat> $dnisNumberFormat
     * @param SipRegion|value-of<SipRegion> $sipRegion
     * @param SipSubdomainReceiveSettings|value-of<SipSubdomainReceiveSettings> $sipSubdomainReceiveSettings
     */
    public static function with(
        AniNumberFormat|string|null $aniNumberFormat = null,
        ?int $channelLimit = null,
        ?array $codecs = null,
        ?string $defaultPrimaryFqdnID = null,
        DefaultRoutingMethod|string|null $defaultRoutingMethod = null,
        ?string $defaultSecondaryFqdnID = null,
        ?string $defaultTertiaryFqdnID = null,
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
        $self = new self;

        null !== $aniNumberFormat && $self['aniNumberFormat'] = $aniNumberFormat;
        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $codecs && $self['codecs'] = $codecs;
        null !== $defaultPrimaryFqdnID && $self['defaultPrimaryFqdnID'] = $defaultPrimaryFqdnID;
        null !== $defaultRoutingMethod && $self['defaultRoutingMethod'] = $defaultRoutingMethod;
        null !== $defaultSecondaryFqdnID && $self['defaultSecondaryFqdnID'] = $defaultSecondaryFqdnID;
        null !== $defaultTertiaryFqdnID && $self['defaultTertiaryFqdnID'] = $defaultTertiaryFqdnID;
        null !== $dnisNumberFormat && $self['dnisNumberFormat'] = $dnisNumberFormat;
        null !== $generateRingbackTone && $self['generateRingbackTone'] = $generateRingbackTone;
        null !== $isupHeadersEnabled && $self['isupHeadersEnabled'] = $isupHeadersEnabled;
        null !== $prackEnabled && $self['prackEnabled'] = $prackEnabled;
        null !== $shakenStirEnabled && $self['shakenStirEnabled'] = $shakenStirEnabled;
        null !== $sipCompactHeadersEnabled && $self['sipCompactHeadersEnabled'] = $sipCompactHeadersEnabled;
        null !== $sipRegion && $self['sipRegion'] = $sipRegion;
        null !== $sipSubdomain && $self['sipSubdomain'] = $sipSubdomain;
        null !== $sipSubdomainReceiveSettings && $self['sipSubdomainReceiveSettings'] = $sipSubdomainReceiveSettings;
        null !== $timeout1xxSecs && $self['timeout1xxSecs'] = $timeout1xxSecs;
        null !== $timeout2xxSecs && $self['timeout2xxSecs'] = $timeout2xxSecs;

        return $self;
    }

    /**
     * This setting allows you to set the format with which the caller's number (ANI) is sent for inbound phone calls.
     *
     * @param AniNumberFormat|value-of<AniNumberFormat> $aniNumberFormat
     */
    public function withAniNumberFormat(
        AniNumberFormat|string $aniNumberFormat
    ): self {
        $self = clone $this;
        $self['aniNumberFormat'] = $aniNumberFormat;

        return $self;
    }

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(?int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }

    /**
     * Defines the list of codecs that Telnyx will send for inbound calls to a specific number on your portal account, in priority order. This only works when the Connection the number is assigned to uses Media Handling mode: default. OPUS and H.264 codecs are available only when using TCP or TLS transport for SIP.
     *
     * @param list<string> $codecs
     */
    public function withCodecs(array $codecs): self
    {
        $self = clone $this;
        $self['codecs'] = $codecs;

        return $self;
    }

    /**
     * The default primary FQDN to use for the number. Only settable if the connection is
     * of FQDN type. Value must be the ID of an FQDN set on the connection.
     */
    public function withDefaultPrimaryFqdnID(
        ?string $defaultPrimaryFqdnID
    ): self {
        $self = clone $this;
        $self['defaultPrimaryFqdnID'] = $defaultPrimaryFqdnID;

        return $self;
    }

    /**
     * Default routing method to be used when a number is associated with the connection. Must be one of the routing method types or null, other values are not allowed.
     *
     * @param DefaultRoutingMethod|value-of<DefaultRoutingMethod>|null $defaultRoutingMethod
     */
    public function withDefaultRoutingMethod(
        DefaultRoutingMethod|string|null $defaultRoutingMethod
    ): self {
        $self = clone $this;
        $self['defaultRoutingMethod'] = $defaultRoutingMethod;

        return $self;
    }

    /**
     * The default secondary FQDN to use for the number. Only settable if the connection is
     * of FQDN type. Value must be the ID of an FQDN set on the connection.
     */
    public function withDefaultSecondaryFqdnID(
        ?string $defaultSecondaryFqdnID
    ): self {
        $self = clone $this;
        $self['defaultSecondaryFqdnID'] = $defaultSecondaryFqdnID;

        return $self;
    }

    /**
     * The default tertiary FQDN to use for the number. Only settable if the connection is
     * of FQDN type. Value must be the ID of an FQDN set on the connection.
     */
    public function withDefaultTertiaryFqdnID(
        ?string $defaultTertiaryFqdnID
    ): self {
        $self = clone $this;
        $self['defaultTertiaryFqdnID'] = $defaultTertiaryFqdnID;

        return $self;
    }

    /**
     * @param DnisNumberFormat|value-of<DnisNumberFormat> $dnisNumberFormat
     */
    public function withDnisNumberFormat(
        DnisNumberFormat|string $dnisNumberFormat
    ): self {
        $self = clone $this;
        $self['dnisNumberFormat'] = $dnisNumberFormat;

        return $self;
    }

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    public function withGenerateRingbackTone(bool $generateRingbackTone): self
    {
        $self = clone $this;
        $self['generateRingbackTone'] = $generateRingbackTone;

        return $self;
    }

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    public function withIsupHeadersEnabled(bool $isupHeadersEnabled): self
    {
        $self = clone $this;
        $self['isupHeadersEnabled'] = $isupHeadersEnabled;

        return $self;
    }

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    public function withPrackEnabled(bool $prackEnabled): self
    {
        $self = clone $this;
        $self['prackEnabled'] = $prackEnabled;

        return $self;
    }

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    public function withShakenStirEnabled(bool $shakenStirEnabled): self
    {
        $self = clone $this;
        $self['shakenStirEnabled'] = $shakenStirEnabled;

        return $self;
    }

    /**
     * Defaults to true.
     */
    public function withSipCompactHeadersEnabled(
        bool $sipCompactHeadersEnabled
    ): self {
        $self = clone $this;
        $self['sipCompactHeadersEnabled'] = $sipCompactHeadersEnabled;

        return $self;
    }

    /**
     * Selects which `sip_region` to receive inbound calls from. If null, the default region (US) will be used.
     *
     * @param SipRegion|value-of<SipRegion> $sipRegion
     */
    public function withSipRegion(SipRegion|string $sipRegion): self
    {
        $self = clone $this;
        $self['sipRegion'] = $sipRegion;

        return $self;
    }

    /**
     * Specifies a subdomain that can be used to receive Inbound calls to a Connection, in the same way a phone number is used, from a SIP endpoint. Example: the subdomain "example.sip.telnyx.com" can be called from any SIP endpoint by using the SIP URI "sip:@example.sip.telnyx.com" where the user part can be any alphanumeric value. Please note TLS encrypted calls are not allowed for subdomain calls.
     */
    public function withSipSubdomain(?string $sipSubdomain): self
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

    /**
     * Time(sec) before aborting if connection is not made.
     */
    public function withTimeout1xxSecs(int $timeout1xxSecs): self
    {
        $self = clone $this;
        $self['timeout1xxSecs'] = $timeout1xxSecs;

        return $self;
    }

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    public function withTimeout2xxSecs(int $timeout2xxSecs): self
    {
        $self = clone $this;
        $self['timeout2xxSecs'] = $timeout2xxSecs;

        return $self;
    }
}
