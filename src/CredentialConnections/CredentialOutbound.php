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
 *   ani_override?: string|null,
 *   ani_override_type?: value-of<AniOverrideType>|null,
 *   call_parking_enabled?: bool|null,
 *   channel_limit?: int|null,
 *   generate_ringback_tone?: bool|null,
 *   instant_ringback_enabled?: bool|null,
 *   localization?: string|null,
 *   outbound_voice_profile_id?: string|null,
 *   t38_reinvite_source?: value-of<T38ReinviteSource>|null,
 * }
 */
final class CredentialOutbound implements BaseModel
{
    /** @use SdkModel<CredentialOutboundShape> */
    use SdkModel;

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    #[Optional]
    public ?string $ani_override;

    /**
     * Specifies when we apply your ani_override setting. Only applies when ani_override is not blank.
     *
     * @var value-of<AniOverrideType>|null $ani_override_type
     */
    #[Optional(enum: AniOverrideType::class)]
    public ?string $ani_override_type;

    /**
     * Forces all SIP calls originated on this connection to be "parked" instead of "bridged" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    #[Optional(nullable: true)]
    public ?bool $call_parking_enabled;

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    #[Optional]
    public ?int $channel_limit;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Optional]
    public ?bool $generate_ringback_tone;

    /**
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    #[Optional]
    public ?bool $instant_ringback_enabled;

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.
     */
    #[Optional]
    public ?string $localization;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Optional]
    public ?string $outbound_voice_profile_id;

    /**
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite.<br/><br/> By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
     *
     * @var value-of<T38ReinviteSource>|null $t38_reinvite_source
     */
    #[Optional(enum: T38ReinviteSource::class)]
    public ?string $t38_reinvite_source;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AniOverrideType|value-of<AniOverrideType> $ani_override_type
     * @param T38ReinviteSource|value-of<T38ReinviteSource> $t38_reinvite_source
     */
    public static function with(
        ?string $ani_override = null,
        AniOverrideType|string|null $ani_override_type = null,
        ?bool $call_parking_enabled = null,
        ?int $channel_limit = null,
        ?bool $generate_ringback_tone = null,
        ?bool $instant_ringback_enabled = null,
        ?string $localization = null,
        ?string $outbound_voice_profile_id = null,
        T38ReinviteSource|string|null $t38_reinvite_source = null,
    ): self {
        $obj = new self;

        null !== $ani_override && $obj['ani_override'] = $ani_override;
        null !== $ani_override_type && $obj['ani_override_type'] = $ani_override_type;
        null !== $call_parking_enabled && $obj['call_parking_enabled'] = $call_parking_enabled;
        null !== $channel_limit && $obj['channel_limit'] = $channel_limit;
        null !== $generate_ringback_tone && $obj['generate_ringback_tone'] = $generate_ringback_tone;
        null !== $instant_ringback_enabled && $obj['instant_ringback_enabled'] = $instant_ringback_enabled;
        null !== $localization && $obj['localization'] = $localization;
        null !== $outbound_voice_profile_id && $obj['outbound_voice_profile_id'] = $outbound_voice_profile_id;
        null !== $t38_reinvite_source && $obj['t38_reinvite_source'] = $t38_reinvite_source;

        return $obj;
    }

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    public function withAniOverride(string $aniOverride): self
    {
        $obj = clone $this;
        $obj['ani_override'] = $aniOverride;

        return $obj;
    }

    /**
     * Specifies when we apply your ani_override setting. Only applies when ani_override is not blank.
     *
     * @param AniOverrideType|value-of<AniOverrideType> $aniOverrideType
     */
    public function withAniOverrideType(
        AniOverrideType|string $aniOverrideType
    ): self {
        $obj = clone $this;
        $obj['ani_override_type'] = $aniOverrideType;

        return $obj;
    }

    /**
     * Forces all SIP calls originated on this connection to be "parked" instead of "bridged" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    public function withCallParkingEnabled(?bool $callParkingEnabled): self
    {
        $obj = clone $this;
        $obj['call_parking_enabled'] = $callParkingEnabled;

        return $obj;
    }

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channel_limit'] = $channelLimit;

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
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    public function withInstantRingbackEnabled(
        bool $instantRingbackEnabled
    ): self {
        $obj = clone $this;
        $obj['instant_ringback_enabled'] = $instantRingbackEnabled;

        return $obj;
    }

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.
     */
    public function withLocalization(string $localization): self
    {
        $obj = clone $this;
        $obj['localization'] = $localization;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outbound_voice_profile_id'] = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite.<br/><br/> By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
     *
     * @param T38ReinviteSource|value-of<T38ReinviteSource> $t38ReinviteSource
     */
    public function withT38ReinviteSource(
        T38ReinviteSource|string $t38ReinviteSource
    ): self {
        $obj = clone $this;
        $obj['t38_reinvite_source'] = $t38ReinviteSource;

        return $obj;
    }
}
