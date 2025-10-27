<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;

/**
 * Update a phone number with voice settings.
 *
 * @see Telnyx\PhoneNumbers\Voice->update
 *
 * @phpstan-type voice_update_params = array{
 *   callForwarding?: CallForwarding,
 *   callRecording?: CallRecording,
 *   callerIDNameEnabled?: bool,
 *   cnamListing?: CnamListing,
 *   inboundCallScreening?: InboundCallScreening|value-of<InboundCallScreening>,
 *   mediaFeatures?: MediaFeatures,
 *   techPrefixEnabled?: bool,
 *   translatedNumber?: string,
 *   usagePaymentMethod?: UsagePaymentMethod|value-of<UsagePaymentMethod>,
 * }
 */
final class VoiceUpdateParams implements BaseModel
{
    /** @use SdkModel<voice_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The call forwarding settings for a phone number.
     */
    #[Api('call_forwarding', optional: true)]
    public ?CallForwarding $callForwarding;

    /**
     * The call recording settings for a phone number.
     */
    #[Api('call_recording', optional: true)]
    public ?CallRecording $callRecording;

    /**
     * Controls whether the caller ID name is enabled for this phone number.
     */
    #[Api('caller_id_name_enabled', optional: true)]
    public ?bool $callerIDNameEnabled;

    /**
     * The CNAM listing settings for a phone number.
     */
    #[Api('cnam_listing', optional: true)]
    public ?CnamListing $cnamListing;

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @var value-of<InboundCallScreening>|null $inboundCallScreening
     */
    #[Api(
        'inbound_call_screening',
        enum: InboundCallScreening::class,
        optional: true
    )]
    public ?string $inboundCallScreening;

    /**
     * The media features settings for a phone number.
     */
    #[Api('media_features', optional: true)]
    public ?MediaFeatures $mediaFeatures;

    /**
     * Controls whether a tech prefix is enabled for this phone number.
     */
    #[Api('tech_prefix_enabled', optional: true)]
    public ?bool $techPrefixEnabled;

    /**
     * This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     */
    #[Api('translated_number', optional: true)]
    public ?string $translatedNumber;

    /**
     * Controls whether a number is billed per minute or uses your concurrent channels.
     *
     * @var value-of<UsagePaymentMethod>|null $usagePaymentMethod
     */
    #[Api(
        'usage_payment_method',
        enum: UsagePaymentMethod::class,
        optional: true
    )]
    public ?string $usagePaymentMethod;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     */
    public static function with(
        ?CallForwarding $callForwarding = null,
        ?CallRecording $callRecording = null,
        ?bool $callerIDNameEnabled = null,
        ?CnamListing $cnamListing = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?MediaFeatures $mediaFeatures = null,
        ?bool $techPrefixEnabled = null,
        ?string $translatedNumber = null,
        UsagePaymentMethod|string|null $usagePaymentMethod = null,
    ): self {
        $obj = new self;

        null !== $callForwarding && $obj->callForwarding = $callForwarding;
        null !== $callRecording && $obj->callRecording = $callRecording;
        null !== $callerIDNameEnabled && $obj->callerIDNameEnabled = $callerIDNameEnabled;
        null !== $cnamListing && $obj->cnamListing = $cnamListing;
        null !== $inboundCallScreening && $obj['inboundCallScreening'] = $inboundCallScreening;
        null !== $mediaFeatures && $obj->mediaFeatures = $mediaFeatures;
        null !== $techPrefixEnabled && $obj->techPrefixEnabled = $techPrefixEnabled;
        null !== $translatedNumber && $obj->translatedNumber = $translatedNumber;
        null !== $usagePaymentMethod && $obj['usagePaymentMethod'] = $usagePaymentMethod;

        return $obj;
    }

    /**
     * The call forwarding settings for a phone number.
     */
    public function withCallForwarding(CallForwarding $callForwarding): self
    {
        $obj = clone $this;
        $obj->callForwarding = $callForwarding;

        return $obj;
    }

    /**
     * The call recording settings for a phone number.
     */
    public function withCallRecording(CallRecording $callRecording): self
    {
        $obj = clone $this;
        $obj->callRecording = $callRecording;

        return $obj;
    }

    /**
     * Controls whether the caller ID name is enabled for this phone number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj->callerIDNameEnabled = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * The CNAM listing settings for a phone number.
     */
    public function withCnamListing(CnamListing $cnamListing): self
    {
        $obj = clone $this;
        $obj->cnamListing = $cnamListing;

        return $obj;
    }

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     */
    public function withInboundCallScreening(
        InboundCallScreening|string $inboundCallScreening
    ): self {
        $obj = clone $this;
        $obj['inboundCallScreening'] = $inboundCallScreening;

        return $obj;
    }

    /**
     * The media features settings for a phone number.
     */
    public function withMediaFeatures(MediaFeatures $mediaFeatures): self
    {
        $obj = clone $this;
        $obj->mediaFeatures = $mediaFeatures;

        return $obj;
    }

    /**
     * Controls whether a tech prefix is enabled for this phone number.
     */
    public function withTechPrefixEnabled(bool $techPrefixEnabled): self
    {
        $obj = clone $this;
        $obj->techPrefixEnabled = $techPrefixEnabled;

        return $obj;
    }

    /**
     * This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     */
    public function withTranslatedNumber(string $translatedNumber): self
    {
        $obj = clone $this;
        $obj->translatedNumber = $translatedNumber;

        return $obj;
    }

    /**
     * Controls whether a number is billed per minute or uses your concurrent channels.
     *
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     */
    public function withUsagePaymentMethod(
        UsagePaymentMethod|string $usagePaymentMethod
    ): self {
        $obj = clone $this;
        $obj['usagePaymentMethod'] = $usagePaymentMethod;

        return $obj;
    }
}
