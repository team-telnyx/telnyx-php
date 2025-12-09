<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialOutbound\AniOverrideType;
use Telnyx\CredentialConnections\CredentialOutbound\T38ReinviteSource;

/**
 * @phpstan-type CredentialOutboundShape = array{
 *   aniOverride?: string|null,
 *   aniOverrideType?: value-of<AniOverrideType>|null,
 *   callParkingEnabled?: bool|null,
 *   channelLimit?: int|null,
 *   generateRingbackTone?: bool|null,
 *   instantRingbackEnabled?: bool|null,
 *   localization?: string|null,
 *   outboundVoiceProfileID?: string|null,
 *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
 * }
 */
final class CredentialOutbound implements BaseModel
{
    /** @use SdkModel<CredentialOutboundShape> */
    use SdkModel;

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    #[Optional('ani_override')]
    public ?string $aniOverride;

    /**
     * Specifies when we apply your ani_override setting. Only applies when ani_override is not blank.
     *
     * @var value-of<AniOverrideType>|null $aniOverrideType
     */
    #[Optional('ani_override_type', enum: AniOverrideType::class)]
    public ?string $aniOverrideType;

    /**
     * Forces all SIP calls originated on this connection to be "parked" instead of "bridged" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    #[Optional('call_parking_enabled', nullable: true)]
    public ?bool $callParkingEnabled;

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

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

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.
     */
    #[Optional]
    public ?string $localization;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Optional('outbound_voice_profile_id')]
    public ?string $outboundVoiceProfileID;

    /**
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite.<br/><br/> By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
     *
     * @var value-of<T38ReinviteSource>|null $t38ReinviteSource
     */
    #[Optional('t38_reinvite_source', enum: T38ReinviteSource::class)]
    public ?string $t38ReinviteSource;

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
     * @param T38ReinviteSource|value-of<T38ReinviteSource> $t38ReinviteSource
     */
    public static function with(
        ?string $aniOverride = null,
        AniOverrideType|string|null $aniOverrideType = null,
        ?bool $callParkingEnabled = null,
        ?int $channelLimit = null,
        ?bool $generateRingbackTone = null,
        ?bool $instantRingbackEnabled = null,
        ?string $localization = null,
        ?string $outboundVoiceProfileID = null,
        T38ReinviteSource|string|null $t38ReinviteSource = null,
    ): self {
        $self = new self;

        null !== $aniOverride && $self['aniOverride'] = $aniOverride;
        null !== $aniOverrideType && $self['aniOverrideType'] = $aniOverrideType;
        null !== $callParkingEnabled && $self['callParkingEnabled'] = $callParkingEnabled;
        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $generateRingbackTone && $self['generateRingbackTone'] = $generateRingbackTone;
        null !== $instantRingbackEnabled && $self['instantRingbackEnabled'] = $instantRingbackEnabled;
        null !== $localization && $self['localization'] = $localization;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;
        null !== $t38ReinviteSource && $self['t38ReinviteSource'] = $t38ReinviteSource;

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
     * Specifies when we apply your ani_override setting. Only applies when ani_override is not blank.
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
     * Forces all SIP calls originated on this connection to be "parked" instead of "bridged" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    public function withCallParkingEnabled(?bool $callParkingEnabled): self
    {
        $self = clone $this;
        $self['callParkingEnabled'] = $callParkingEnabled;

        return $self;
    }

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

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
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.
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
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite.<br/><br/> By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
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
}
