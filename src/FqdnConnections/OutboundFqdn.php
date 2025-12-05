<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\FqdnConnections\OutboundFqdn\AniOverrideType;
use Telnyx\FqdnConnections\OutboundFqdn\IPAuthenticationMethod;
use Telnyx\FqdnConnections\OutboundFqdn\T38ReinviteSource;

/**
 * @phpstan-type OutboundFqdnShape = array{
 *   ani_override?: string|null,
 *   ani_override_type?: value-of<AniOverrideType>|null,
 *   call_parking_enabled?: bool|null,
 *   channel_limit?: int|null,
 *   encrypted_media?: value-of<EncryptedMedia>|null,
 *   generate_ringback_tone?: bool|null,
 *   instant_ringback_enabled?: bool|null,
 *   ip_authentication_method?: value-of<IPAuthenticationMethod>|null,
 *   ip_authentication_token?: string|null,
 *   localization?: string|null,
 *   outbound_voice_profile_id?: string|null,
 *   t38_reinvite_source?: value-of<T38ReinviteSource>|null,
 *   tech_prefix?: string|null,
 *   timeout_1xx_secs?: int|null,
 *   timeout_2xx_secs?: int|null,
 * }
 */
final class OutboundFqdn implements BaseModel
{
    /** @use SdkModel<OutboundFqdnShape> */
    use SdkModel;

    /**
     * Set a phone number as the ani_override value to override caller id number on outbound calls.
     */
    #[Api(optional: true)]
    public ?string $ani_override;

    /**
     * Specifies when we should apply your ani_override setting. Only applies when ani_override is not blank.
     *
     * @var value-of<AniOverrideType>|null $ani_override_type
     */
    #[Api(enum: AniOverrideType::class, optional: true)]
    public ?string $ani_override_type;

    /**
     * Forces all SIP calls originated on this connection to be \"parked\" instead of \"bridged\" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    #[Api(nullable: true, optional: true)]
    public ?bool $call_parking_enabled;

    /**
     * When set, this will limit the total number of inbound calls to phone numbers associated with this connection.
     */
    #[Api(optional: true)]
    public ?int $channel_limit;

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @var value-of<EncryptedMedia>|null $encrypted_media
     */
    #[Api(enum: EncryptedMedia::class, nullable: true, optional: true)]
    public ?string $encrypted_media;

    /**
     * Generate ringback tone through 183 session progress message with early media.
     */
    #[Api(optional: true)]
    public ?bool $generate_ringback_tone;

    /**
     * When set, ringback will not wait for indication before sending ringback tone to calling party.
     */
    #[Api(optional: true)]
    public ?bool $instant_ringback_enabled;

    /** @var value-of<IPAuthenticationMethod>|null $ip_authentication_method */
    #[Api(enum: IPAuthenticationMethod::class, optional: true)]
    public ?string $ip_authentication_method;

    #[Api(optional: true)]
    public ?string $ip_authentication_token;

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.",.
     */
    #[Api(optional: true)]
    public ?string $localization;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api(optional: true)]
    public ?string $outbound_voice_profile_id;

    /**
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite. By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
     *
     * @var value-of<T38ReinviteSource>|null $t38_reinvite_source
     */
    #[Api(enum: T38ReinviteSource::class, optional: true)]
    public ?string $t38_reinvite_source;

    /**
     * Numerical chars only, exactly 4 characters.
     */
    #[Api(optional: true)]
    public ?string $tech_prefix;

    /**
     * Time(sec) before aborting if connection is not made.
     */
    #[Api(optional: true)]
    public ?int $timeout_1xx_secs;

    /**
     * Time(sec) before aborting if call is unanswered (min: 1, max: 600).
     */
    #[Api(optional: true)]
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
     * @param AniOverrideType|value-of<AniOverrideType> $ani_override_type
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encrypted_media
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ip_authentication_method
     * @param T38ReinviteSource|value-of<T38ReinviteSource> $t38_reinvite_source
     */
    public static function with(
        ?string $ani_override = null,
        AniOverrideType|string|null $ani_override_type = null,
        ?bool $call_parking_enabled = null,
        ?int $channel_limit = null,
        EncryptedMedia|string|null $encrypted_media = null,
        ?bool $generate_ringback_tone = null,
        ?bool $instant_ringback_enabled = null,
        IPAuthenticationMethod|string|null $ip_authentication_method = null,
        ?string $ip_authentication_token = null,
        ?string $localization = null,
        ?string $outbound_voice_profile_id = null,
        T38ReinviteSource|string|null $t38_reinvite_source = null,
        ?string $tech_prefix = null,
        ?int $timeout_1xx_secs = null,
        ?int $timeout_2xx_secs = null,
    ): self {
        $obj = new self;

        null !== $ani_override && $obj['ani_override'] = $ani_override;
        null !== $ani_override_type && $obj['ani_override_type'] = $ani_override_type;
        null !== $call_parking_enabled && $obj['call_parking_enabled'] = $call_parking_enabled;
        null !== $channel_limit && $obj['channel_limit'] = $channel_limit;
        null !== $encrypted_media && $obj['encrypted_media'] = $encrypted_media;
        null !== $generate_ringback_tone && $obj['generate_ringback_tone'] = $generate_ringback_tone;
        null !== $instant_ringback_enabled && $obj['instant_ringback_enabled'] = $instant_ringback_enabled;
        null !== $ip_authentication_method && $obj['ip_authentication_method'] = $ip_authentication_method;
        null !== $ip_authentication_token && $obj['ip_authentication_token'] = $ip_authentication_token;
        null !== $localization && $obj['localization'] = $localization;
        null !== $outbound_voice_profile_id && $obj['outbound_voice_profile_id'] = $outbound_voice_profile_id;
        null !== $t38_reinvite_source && $obj['t38_reinvite_source'] = $t38_reinvite_source;
        null !== $tech_prefix && $obj['tech_prefix'] = $tech_prefix;
        null !== $timeout_1xx_secs && $obj['timeout_1xx_secs'] = $timeout_1xx_secs;
        null !== $timeout_2xx_secs && $obj['timeout_2xx_secs'] = $timeout_2xx_secs;

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
     * Specifies when we should apply your ani_override setting. Only applies when ani_override is not blank.
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
     * Forces all SIP calls originated on this connection to be \"parked\" instead of \"bridged\" to the destination specified on the URI. Parked calls will return ringback to the caller and will await for a Call Control command to define which action will be taken next.
     */
    public function withCallParkingEnabled(?bool $callParkingEnabled): self
    {
        $obj = clone $this;
        $obj['call_parking_enabled'] = $callParkingEnabled;

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
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     */
    public function withEncryptedMedia(
        EncryptedMedia|string|null $encryptedMedia
    ): self {
        $obj = clone $this;
        $obj['encrypted_media'] = $encryptedMedia;

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
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ipAuthenticationMethod
     */
    public function withIPAuthenticationMethod(
        IPAuthenticationMethod|string $ipAuthenticationMethod
    ): self {
        $obj = clone $this;
        $obj['ip_authentication_method'] = $ipAuthenticationMethod;

        return $obj;
    }

    public function withIPAuthenticationToken(
        string $ipAuthenticationToken
    ): self {
        $obj = clone $this;
        $obj['ip_authentication_token'] = $ipAuthenticationToken;

        return $obj;
    }

    /**
     * A 2-character country code specifying the country whose national dialing rules should be used. For example, if set to `US` then any US number can be dialed without preprending +1 to the number. When left blank, Telnyx will try US and GB dialing rules, in that order, by default.",.
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
     * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite. By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
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

    /**
     * Numerical chars only, exactly 4 characters.
     */
    public function withTechPrefix(string $techPrefix): self
    {
        $obj = clone $this;
        $obj['tech_prefix'] = $techPrefix;

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
