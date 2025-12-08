<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialInbound\AniNumberFormat;
use Telnyx\CredentialConnections\CredentialInbound\DnisNumberFormat;

/**
 * @phpstan-type CredentialInboundShape = array{
 *   ani_number_format?: value-of<AniNumberFormat>|null,
 *   channel_limit?: int|null,
 *   codecs?: list<string>|null,
 *   dnis_number_format?: value-of<DnisNumberFormat>|null,
 *   generate_ringback_tone?: bool|null,
 *   isup_headers_enabled?: bool|null,
 *   prack_enabled?: bool|null,
 *   shaken_stir_enabled?: bool|null,
 *   sip_compact_headers_enabled?: bool|null,
 *   timeout_1xx_secs?: int|null,
 *   timeout_2xx_secs?: int|null,
 * }
 */
final class CredentialInbound implements BaseModel
{
    /** @use SdkModel<CredentialInboundShape> */
    use SdkModel;

    /**
     * This setting allows you to set the format with which the caller's number (ANI) is sent for inbound phone calls.
     *
     * @var value-of<AniNumberFormat>|null $ani_number_format
     */
    #[Optional(enum: AniNumberFormat::class)]
    public ?string $ani_number_format;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Optional]
    public ?int $channel_limit;

    /**
     * Defines the list of codecs that Telnyx will send for inbound calls to a specific number on your portal account, in priority order. This only works when the Connection the number is assigned to uses Media Handling mode: default. OPUS and H.264 codecs are available only when using TCP or TLS transport for SIP.
     *
     * @var list<string>|null $codecs
     */
    #[Optional(list: 'string')]
    public ?array $codecs;

    /** @var value-of<DnisNumberFormat>|null $dnis_number_format */
    #[Optional(enum: DnisNumberFormat::class)]
    public ?string $dnis_number_format;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Optional]
    public ?bool $generate_ringback_tone;

    /**
     * When set, inbound phone calls will receive ISUP parameters via SIP headers. (Only when available and only when using TCP or TLS transport.).
     */
    #[Optional]
    public ?bool $isup_headers_enabled;

    /**
     * Enable PRACK messages as defined in RFC3262.
     */
    #[Optional]
    public ?bool $prack_enabled;

    /**
     * When enabled the SIP Connection will receive the Identity header with Shaken/Stir data in the SIP INVITE message of inbound calls, even when using UDP transport.
     */
    #[Optional]
    public ?bool $shaken_stir_enabled;

    /**
     * Defaults to true.
     */
    #[Optional]
    public ?bool $sip_compact_headers_enabled;

    /**
     * Time(sec) before aborting if connection is not made.
     */
    #[Optional]
    public ?int $timeout_1xx_secs;

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    #[Optional]
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
     * @param DnisNumberFormat|value-of<DnisNumberFormat> $dnis_number_format
     */
    public static function with(
        AniNumberFormat|string|null $ani_number_format = null,
        ?int $channel_limit = null,
        ?array $codecs = null,
        DnisNumberFormat|string|null $dnis_number_format = null,
        ?bool $generate_ringback_tone = null,
        ?bool $isup_headers_enabled = null,
        ?bool $prack_enabled = null,
        ?bool $shaken_stir_enabled = null,
        ?bool $sip_compact_headers_enabled = null,
        ?int $timeout_1xx_secs = null,
        ?int $timeout_2xx_secs = null,
    ): self {
        $obj = new self;

        null !== $ani_number_format && $obj['ani_number_format'] = $ani_number_format;
        null !== $channel_limit && $obj['channel_limit'] = $channel_limit;
        null !== $codecs && $obj['codecs'] = $codecs;
        null !== $dnis_number_format && $obj['dnis_number_format'] = $dnis_number_format;
        null !== $generate_ringback_tone && $obj['generate_ringback_tone'] = $generate_ringback_tone;
        null !== $isup_headers_enabled && $obj['isup_headers_enabled'] = $isup_headers_enabled;
        null !== $prack_enabled && $obj['prack_enabled'] = $prack_enabled;
        null !== $shaken_stir_enabled && $obj['shaken_stir_enabled'] = $shaken_stir_enabled;
        null !== $sip_compact_headers_enabled && $obj['sip_compact_headers_enabled'] = $sip_compact_headers_enabled;
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
