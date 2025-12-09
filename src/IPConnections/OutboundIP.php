<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IPConnections\OutboundIP\AniOverrideType;
use Telnyx\IPConnections\OutboundIP\IPAuthenticationMethod;
use Telnyx\IPConnections\OutboundIP\T38ReinviteSource;

/**
 * @phpstan-type OutboundIPShape = array{
 *   aniOverride?: string|null,
 *   aniOverrideType?: value-of<AniOverrideType>|null,
 *   callParkingEnabled?: bool|null,
 *   channelLimit?: int|null,
 *   generateRingbackTone?: bool|null,
 *   instantRingbackEnabled?: bool|null,
 *   ipAuthenticationMethod?: value-of<IPAuthenticationMethod>|null,
 *   ipAuthenticationToken?: string|null,
 *   localization?: string|null,
 *   outboundVoiceProfileID?: string|null,
 *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
 *   techPrefix?: string|null,
 * }
 */
final class OutboundIP implements BaseModel
{
    /** @use SdkModel<OutboundIPShape> */
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

    /** @var value-of<IPAuthenticationMethod>|null $ipAuthenticationMethod */
    #[Optional('ip_authentication_method', enum: IPAuthenticationMethod::class)]
    public ?string $ipAuthenticationMethod;

    #[Optional('ip_authentication_token')]
    public ?string $ipAuthenticationToken;

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

    /**
     * Numerical chars only, exactly 4 characters.
     */
    #[Optional('tech_prefix')]
    public ?string $techPrefix;

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
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ipAuthenticationMethod
     * @param T38ReinviteSource|value-of<T38ReinviteSource> $t38ReinviteSource
     */
    public static function with(
        ?string $aniOverride = null,
        AniOverrideType|string|null $aniOverrideType = null,
        ?bool $callParkingEnabled = null,
        ?int $channelLimit = null,
        ?bool $generateRingbackTone = null,
        ?bool $instantRingbackEnabled = null,
        IPAuthenticationMethod|string|null $ipAuthenticationMethod = null,
        ?string $ipAuthenticationToken = null,
        ?string $localization = null,
        ?string $outboundVoiceProfileID = null,
        T38ReinviteSource|string|null $t38ReinviteSource = null,
        ?string $techPrefix = null,
    ): self {
        $obj = new self;

        null !== $aniOverride && $obj['aniOverride'] = $aniOverride;
        null !== $aniOverrideType && $obj['aniOverrideType'] = $aniOverrideType;
        null !== $callParkingEnabled && $obj['callParkingEnabled'] = $callParkingEnabled;
        null !== $channelLimit && $obj['channelLimit'] = $channelLimit;
        null !== $generateRingbackTone && $obj['generateRingbackTone'] = $generateRingbackTone;
        null !== $instantRingbackEnabled && $obj['instantRingbackEnabled'] = $instantRingbackEnabled;
        null !== $ipAuthenticationMethod && $obj['ipAuthenticationMethod'] = $ipAuthenticationMethod;
        null !== $ipAuthenticationToken && $obj['ipAuthenticationToken'] = $ipAuthenticationToken;
        null !== $localization && $obj['localization'] = $localization;
        null !== $outboundVoiceProfileID && $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;
        null !== $t38ReinviteSource && $obj['t38ReinviteSource'] = $t38ReinviteSource;
        null !== $techPrefix && $obj['techPrefix'] = $techPrefix;

        return $obj;
    }

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    public function withAniOverride(string $aniOverride): self
    {
        $obj = clone $this;
        $obj['aniOverride'] = $aniOverride;

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
        $obj['aniOverrideType'] = $aniOverrideType;

        return $obj;
    }

    /**
     * Forces all SIP calls originated on this connection to be "parked" instead of "bridged" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    public function withCallParkingEnabled(?bool $callParkingEnabled): self
    {
        $obj = clone $this;
        $obj['callParkingEnabled'] = $callParkingEnabled;

        return $obj;
    }

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channelLimit'] = $channelLimit;

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
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    public function withInstantRingbackEnabled(
        bool $instantRingbackEnabled
    ): self {
        $obj = clone $this;
        $obj['instantRingbackEnabled'] = $instantRingbackEnabled;

        return $obj;
    }

    /**
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ipAuthenticationMethod
     */
    public function withIPAuthenticationMethod(
        IPAuthenticationMethod|string $ipAuthenticationMethod
    ): self {
        $obj = clone $this;
        $obj['ipAuthenticationMethod'] = $ipAuthenticationMethod;

        return $obj;
    }

    public function withIPAuthenticationToken(
        string $ipAuthenticationToken
    ): self {
        $obj = clone $this;
        $obj['ipAuthenticationToken'] = $ipAuthenticationToken;

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
        $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

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
        $obj['t38ReinviteSource'] = $t38ReinviteSource;

        return $obj;
    }

    /**
     * Numerical chars only, exactly 4 characters.
     */
    public function withTechPrefix(string $techPrefix): self
    {
        $obj = clone $this;
        $obj['techPrefix'] = $techPrefix;

        return $obj;
    }
}
