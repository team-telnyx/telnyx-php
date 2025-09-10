<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialOutbound\AniOverrideType;
use Telnyx\CredentialConnections\CredentialOutbound\T38ReinviteSource;

/**
 * @phpstan-type credential_outbound = array{
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
    /** @use SdkModel<credential_outbound> */
    use SdkModel;

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    #[Api('ani_override', optional: true)]
    public ?string $aniOverride;

    /**
     * Specifies when we apply your ani_override setting. Only applies when ani_override is not blank.
     *
     * @var value-of<AniOverrideType>|null $aniOverrideType
     */
    #[Api('ani_override_type', enum: AniOverrideType::class, optional: true)]
    public ?string $aniOverrideType;

    /**
     * Forces all SIP calls originated on this connection to be "parked" instead of "bridged" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    #[Api('call_parking_enabled', nullable: true, optional: true)]
    public ?bool $callParkingEnabled;

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    #[Api('channel_limit', optional: true)]
    public ?int $channelLimit;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Api('generate_ringback_tone', optional: true)]
    public ?bool $generateRingbackTone;

    /**
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    #[Api('instant_ringback_enabled', optional: true)]
    public ?bool $instantRingbackEnabled;

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.
     */
    #[Api(optional: true)]
    public ?string $localization;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api('outbound_voice_profile_id', optional: true)]
    public ?string $outboundVoiceProfileID;

    /**
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite.<br/><br/> By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
     *
     * @var value-of<T38ReinviteSource>|null $t38ReinviteSource
     */
    #[Api('t38_reinvite_source', enum: T38ReinviteSource::class, optional: true)]
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
        $obj = new self;

        null !== $aniOverride && $obj->aniOverride = $aniOverride;
        null !== $aniOverrideType && $obj->aniOverrideType = $aniOverrideType instanceof AniOverrideType ? $aniOverrideType->value : $aniOverrideType;
        null !== $callParkingEnabled && $obj->callParkingEnabled = $callParkingEnabled;
        null !== $channelLimit && $obj->channelLimit = $channelLimit;
        null !== $generateRingbackTone && $obj->generateRingbackTone = $generateRingbackTone;
        null !== $instantRingbackEnabled && $obj->instantRingbackEnabled = $instantRingbackEnabled;
        null !== $localization && $obj->localization = $localization;
        null !== $outboundVoiceProfileID && $obj->outboundVoiceProfileID = $outboundVoiceProfileID;
        null !== $t38ReinviteSource && $obj->t38ReinviteSource = $t38ReinviteSource instanceof T38ReinviteSource ? $t38ReinviteSource->value : $t38ReinviteSource;

        return $obj;
    }

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    public function withAniOverride(string $aniOverride): self
    {
        $obj = clone $this;
        $obj->aniOverride = $aniOverride;

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
        $obj->aniOverrideType = $aniOverrideType instanceof AniOverrideType ? $aniOverrideType->value : $aniOverrideType;

        return $obj;
    }

    /**
     * Forces all SIP calls originated on this connection to be "parked" instead of "bridged" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    public function withCallParkingEnabled(?bool $callParkingEnabled): self
    {
        $obj = clone $this;
        $obj->callParkingEnabled = $callParkingEnabled;

        return $obj;
    }

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj->channelLimit = $channelLimit;

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
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    public function withInstantRingbackEnabled(
        bool $instantRingbackEnabled
    ): self {
        $obj = clone $this;
        $obj->instantRingbackEnabled = $instantRingbackEnabled;

        return $obj;
    }

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.
     */
    public function withLocalization(string $localization): self
    {
        $obj = clone $this;
        $obj->localization = $localization;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj->outboundVoiceProfileID = $outboundVoiceProfileID;

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
        $obj->t38ReinviteSource = $t38ReinviteSource instanceof T38ReinviteSource ? $t38ReinviteSource->value : $t38ReinviteSource;

        return $obj;
    }
}
