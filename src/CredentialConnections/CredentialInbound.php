<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialInbound\AniNumberFormat;
use Telnyx\CredentialConnections\CredentialInbound\DnisNumberFormat;
use Telnyx\CredentialConnections\CredentialInbound\SimultaneousRinging;

/**
 * @phpstan-type CredentialInboundShape = array{
 *   aniNumberFormat?: null|AniNumberFormat|value-of<AniNumberFormat>,
 *   channelLimit?: int|null,
 *   codecs?: list<string>|null,
 *   dnisNumberFormat?: null|DnisNumberFormat|value-of<DnisNumberFormat>,
 *   generateRingbackTone?: bool|null,
 *   isupHeadersEnabled?: bool|null,
 *   prackEnabled?: bool|null,
 *   shakenStirEnabled?: bool|null,
 *   simultaneousRinging?: null|SimultaneousRinging|value-of<SimultaneousRinging>,
 *   sipCompactHeadersEnabled?: bool|null,
 *   timeout1xxSecs?: int|null,
 *   timeout2xxSecs?: int|null,
 * }
 */
final class CredentialInbound implements BaseModel
{
    /** @use SdkModel<CredentialInboundShape> */
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
     * When enabled, allows multiple devices to ring simultaneously on incoming calls.
     *
     * @var value-of<SimultaneousRinging>|null $simultaneousRinging
     */
    #[Optional('simultaneous_ringing', enum: SimultaneousRinging::class)]
    public ?string $simultaneousRinging;

    /**
     * Defaults to true.
     */
    #[Optional('sip_compact_headers_enabled')]
    public ?bool $sipCompactHeadersEnabled;

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
     * @param AniNumberFormat|value-of<AniNumberFormat>|null $aniNumberFormat
     * @param list<string>|null $codecs
     * @param DnisNumberFormat|value-of<DnisNumberFormat>|null $dnisNumberFormat
     * @param SimultaneousRinging|value-of<SimultaneousRinging>|null $simultaneousRinging
     */
    public static function with(
        AniNumberFormat|string|null $aniNumberFormat = null,
        ?int $channelLimit = null,
        ?array $codecs = null,
        DnisNumberFormat|string|null $dnisNumberFormat = null,
        ?bool $generateRingbackTone = null,
        ?bool $isupHeadersEnabled = null,
        ?bool $prackEnabled = null,
        ?bool $shakenStirEnabled = null,
        SimultaneousRinging|string|null $simultaneousRinging = null,
        ?bool $sipCompactHeadersEnabled = null,
        ?int $timeout1xxSecs = null,
        ?int $timeout2xxSecs = null,
    ): self {
        $self = new self;

        null !== $aniNumberFormat && $self['aniNumberFormat'] = $aniNumberFormat;
        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $codecs && $self['codecs'] = $codecs;
        null !== $dnisNumberFormat && $self['dnisNumberFormat'] = $dnisNumberFormat;
        null !== $generateRingbackTone && $self['generateRingbackTone'] = $generateRingbackTone;
        null !== $isupHeadersEnabled && $self['isupHeadersEnabled'] = $isupHeadersEnabled;
        null !== $prackEnabled && $self['prackEnabled'] = $prackEnabled;
        null !== $shakenStirEnabled && $self['shakenStirEnabled'] = $shakenStirEnabled;
        null !== $simultaneousRinging && $self['simultaneousRinging'] = $simultaneousRinging;
        null !== $sipCompactHeadersEnabled && $self['sipCompactHeadersEnabled'] = $sipCompactHeadersEnabled;
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
    public function withChannelLimit(int $channelLimit): self
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
     * When enabled, allows multiple devices to ring simultaneously on incoming calls.
     *
     * @param SimultaneousRinging|value-of<SimultaneousRinging> $simultaneousRinging
     */
    public function withSimultaneousRinging(
        SimultaneousRinging|string $simultaneousRinging
    ): self {
        $self = clone $this;
        $self['simultaneousRinging'] = $simultaneousRinging;

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
