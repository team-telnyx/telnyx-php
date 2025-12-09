<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\FqdnConnections\OutboundFqdn\AniOverrideType;
use Telnyx\FqdnConnections\OutboundFqdn\IPAuthenticationMethod;
use Telnyx\FqdnConnections\OutboundFqdn\T38ReinviteSource;

/**
 * @phpstan-type OutboundFqdnShape = array{
 *   aniOverride?: string|null,
 *   aniOverrideType?: value-of<AniOverrideType>|null,
 *   callParkingEnabled?: bool|null,
 *   channelLimit?: int|null,
 *   encryptedMedia?: value-of<EncryptedMedia>|null,
 *   generateRingbackTone?: bool|null,
 *   instantRingbackEnabled?: bool|null,
 *   ipAuthenticationMethod?: value-of<IPAuthenticationMethod>|null,
 *   ipAuthenticationToken?: string|null,
 *   localization?: string|null,
 *   outboundVoiceProfileID?: string|null,
 *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
 *   techPrefix?: string|null,
 *   timeout1xxSecs?: int|null,
 *   timeout2xxSecs?: int|null,
 * }
 */
final class OutboundFqdn implements BaseModel
{
    /** @use SdkModel<OutboundFqdnShape> */
    use SdkModel;

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    #[Optional('ani_override')]
    public ?string $aniOverride;

    /**
     * Specifies when we should apply your ani_override setting. Only applies when ani_override is not blank.
     *
     * @var value-of<AniOverrideType>|null $aniOverrideType
     */
    #[Optional('ani_override_type', enum: AniOverrideType::class)]
    public ?string $aniOverrideType;

    /**
     * Forces all SIP calls originated on this connection to be \"parked\" instead of \"bridged\" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    #[Optional('call_parking_enabled', nullable: true)]
    public ?bool $callParkingEnabled;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @var value-of<EncryptedMedia>|null $encryptedMedia
     */
    #[Optional('encrypted_media', enum: EncryptedMedia::class, nullable: true)]
    public ?string $encryptedMedia;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Optional('generate_ringback_tone')]
    public ?bool $generateRingbackTone;

    /**
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    #[Optional('instant_ringback_enabled')]
    public ?bool $instantRingbackEnabled;

    /** @var value-of<IPAuthenticationMethod>|null $ipAuthenticationMethod */
    #[Optional('ip_authentication_method', enum: IPAuthenticationMethod::class)]
    public ?string $ipAuthenticationMethod;

    #[Optional('ip_authentication_token')]
    public ?string $ipAuthenticationToken;

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.",.
     */
    #[Optional]
    public ?string $localization;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Optional('outbound_voice_profile_id')]
    public ?string $outboundVoiceProfileID;

    /**
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite. By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
     *
     * @var value-of<T38ReinviteSource>|null $t38ReinviteSource
     */
    #[Optional('t38_reinvite_source', enum: T38ReinviteSource::class)]
    public ?string $t38ReinviteSource;

    /**
     * Numerical chars only, exactly 4 characters.
     */
    #[Optional('tech_prefix')]
    public ?string $techPrefix;

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
     * @param AniOverrideType|value-of<AniOverrideType> $aniOverrideType
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ipAuthenticationMethod
     * @param T38ReinviteSource|value-of<T38ReinviteSource> $t38ReinviteSource
     */
    public static function with(
        ?string $aniOverride = null,
        AniOverrideType|string|null $aniOverrideType = null,
        ?bool $callParkingEnabled = null,
        ?int $channelLimit = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        ?bool $generateRingbackTone = null,
        ?bool $instantRingbackEnabled = null,
        IPAuthenticationMethod|string|null $ipAuthenticationMethod = null,
        ?string $ipAuthenticationToken = null,
        ?string $localization = null,
        ?string $outboundVoiceProfileID = null,
        T38ReinviteSource|string|null $t38ReinviteSource = null,
        ?string $techPrefix = null,
        ?int $timeout1xxSecs = null,
        ?int $timeout2xxSecs = null,
    ): self {
        $self = new self;

        null !== $aniOverride && $self['aniOverride'] = $aniOverride;
        null !== $aniOverrideType && $self['aniOverrideType'] = $aniOverrideType;
        null !== $callParkingEnabled && $self['callParkingEnabled'] = $callParkingEnabled;
        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $encryptedMedia && $self['encryptedMedia'] = $encryptedMedia;
        null !== $generateRingbackTone && $self['generateRingbackTone'] = $generateRingbackTone;
        null !== $instantRingbackEnabled && $self['instantRingbackEnabled'] = $instantRingbackEnabled;
        null !== $ipAuthenticationMethod && $self['ipAuthenticationMethod'] = $ipAuthenticationMethod;
        null !== $ipAuthenticationToken && $self['ipAuthenticationToken'] = $ipAuthenticationToken;
        null !== $localization && $self['localization'] = $localization;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;
        null !== $t38ReinviteSource && $self['t38ReinviteSource'] = $t38ReinviteSource;
        null !== $techPrefix && $self['techPrefix'] = $techPrefix;
        null !== $timeout1xxSecs && $self['timeout1xxSecs'] = $timeout1xxSecs;
        null !== $timeout2xxSecs && $self['timeout2xxSecs'] = $timeout2xxSecs;

        return $self;
    }

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    public function withAniOverride(string $aniOverride): self
    {
        $self = clone $this;
        $self['aniOverride'] = $aniOverride;

        return $self;
    }

    /**
     * Specifies when we should apply your ani_override setting. Only applies when ani_override is not blank.
     *
     * @param AniOverrideType|value-of<AniOverrideType> $aniOverrideType
     */
    public function withAniOverrideType(
        AniOverrideType|string $aniOverrideType
    ): self {
        $self = clone $this;
        $self['aniOverrideType'] = $aniOverrideType;

        return $self;
    }

    /**
     * Forces all SIP calls originated on this connection to be \"parked\" instead of \"bridged\" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    public function withCallParkingEnabled(?bool $callParkingEnabled): self
    {
        $self = clone $this;
        $self['callParkingEnabled'] = $callParkingEnabled;

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
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     */
    public function withEncryptedMedia(
        EncryptedMedia|string|null $encryptedMedia
    ): self {
        $self = clone $this;
        $self['encryptedMedia'] = $encryptedMedia;

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
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    public function withInstantRingbackEnabled(
        bool $instantRingbackEnabled
    ): self {
        $self = clone $this;
        $self['instantRingbackEnabled'] = $instantRingbackEnabled;

        return $self;
    }

    /**
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ipAuthenticationMethod
     */
    public function withIPAuthenticationMethod(
        IPAuthenticationMethod|string $ipAuthenticationMethod
    ): self {
        $self = clone $this;
        $self['ipAuthenticationMethod'] = $ipAuthenticationMethod;

        return $self;
    }

    public function withIPAuthenticationToken(
        string $ipAuthenticationToken
    ): self {
        $self = clone $this;
        $self['ipAuthenticationToken'] = $ipAuthenticationToken;

        return $self;
    }

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.",.
     */
    public function withLocalization(string $localization): self
    {
        $self = clone $this;
        $self['localization'] = $localization;

        return $self;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $self = clone $this;
        $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }

    /**
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite. By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
     *
     * @param T38ReinviteSource|value-of<T38ReinviteSource> $t38ReinviteSource
     */
    public function withT38ReinviteSource(
        T38ReinviteSource|string $t38ReinviteSource
    ): self {
        $self = clone $this;
        $self['t38ReinviteSource'] = $t38ReinviteSource;

        return $self;
    }

    /**
     * Numerical chars only, exactly 4 characters.
     */
    public function withTechPrefix(string $techPrefix): self
    {
        $self = clone $this;
        $self['techPrefix'] = $techPrefix;

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
