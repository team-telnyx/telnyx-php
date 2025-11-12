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
 * @see Telnyx\Services\PhoneNumbers\VoiceService::update()
 *
 * @phpstan-type VoiceUpdateParamsShape = array{
 *   call_forwarding?: CallForwarding,
 *   call_recording?: CallRecording,
 *   caller_id_name_enabled?: bool,
 *   cnam_listing?: CnamListing,
 *   inbound_call_screening?: InboundCallScreening|value-of<InboundCallScreening>,
 *   media_features?: MediaFeatures,
 *   tech_prefix_enabled?: bool,
 *   translated_number?: string,
 *   usage_payment_method?: UsagePaymentMethod|value-of<UsagePaymentMethod>,
 * }
 */
final class VoiceUpdateParams implements BaseModel
{
    /** @use SdkModel<VoiceUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The call forwarding settings for a phone number.
     */
    #[Api(optional: true)]
    public ?CallForwarding $call_forwarding;

    /**
     * The call recording settings for a phone number.
     */
    #[Api(optional: true)]
    public ?CallRecording $call_recording;

    /**
     * Controls whether the caller ID name is enabled for this phone number.
     */
    #[Api(optional: true)]
    public ?bool $caller_id_name_enabled;

    /**
     * The CNAM listing settings for a phone number.
     */
    #[Api(optional: true)]
    public ?CnamListing $cnam_listing;

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @var value-of<InboundCallScreening>|null $inbound_call_screening
     */
    #[Api(enum: InboundCallScreening::class, optional: true)]
    public ?string $inbound_call_screening;

    /**
     * The media features settings for a phone number.
     */
    #[Api(optional: true)]
    public ?MediaFeatures $media_features;

    /**
     * Controls whether a tech prefix is enabled for this phone number.
     */
    #[Api(optional: true)]
    public ?bool $tech_prefix_enabled;

    /**
     * This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     */
    #[Api(optional: true)]
    public ?string $translated_number;

    /**
     * Controls whether a number is billed per minute or uses your concurrent channels.
     *
     * @var value-of<UsagePaymentMethod>|null $usage_payment_method
     */
    #[Api(enum: UsagePaymentMethod::class, optional: true)]
    public ?string $usage_payment_method;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InboundCallScreening|value-of<InboundCallScreening> $inbound_call_screening
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usage_payment_method
     */
    public static function with(
        ?CallForwarding $call_forwarding = null,
        ?CallRecording $call_recording = null,
        ?bool $caller_id_name_enabled = null,
        ?CnamListing $cnam_listing = null,
        InboundCallScreening|string|null $inbound_call_screening = null,
        ?MediaFeatures $media_features = null,
        ?bool $tech_prefix_enabled = null,
        ?string $translated_number = null,
        UsagePaymentMethod|string|null $usage_payment_method = null,
    ): self {
        $obj = new self;

        null !== $call_forwarding && $obj->call_forwarding = $call_forwarding;
        null !== $call_recording && $obj->call_recording = $call_recording;
        null !== $caller_id_name_enabled && $obj->caller_id_name_enabled = $caller_id_name_enabled;
        null !== $cnam_listing && $obj->cnam_listing = $cnam_listing;
        null !== $inbound_call_screening && $obj['inbound_call_screening'] = $inbound_call_screening;
        null !== $media_features && $obj->media_features = $media_features;
        null !== $tech_prefix_enabled && $obj->tech_prefix_enabled = $tech_prefix_enabled;
        null !== $translated_number && $obj->translated_number = $translated_number;
        null !== $usage_payment_method && $obj['usage_payment_method'] = $usage_payment_method;

        return $obj;
    }

    /**
     * The call forwarding settings for a phone number.
     */
    public function withCallForwarding(CallForwarding $callForwarding): self
    {
        $obj = clone $this;
        $obj->call_forwarding = $callForwarding;

        return $obj;
    }

    /**
     * The call recording settings for a phone number.
     */
    public function withCallRecording(CallRecording $callRecording): self
    {
        $obj = clone $this;
        $obj->call_recording = $callRecording;

        return $obj;
    }

    /**
     * Controls whether the caller ID name is enabled for this phone number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj->caller_id_name_enabled = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * The CNAM listing settings for a phone number.
     */
    public function withCnamListing(CnamListing $cnamListing): self
    {
        $obj = clone $this;
        $obj->cnam_listing = $cnamListing;

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
        $obj['inbound_call_screening'] = $inboundCallScreening;

        return $obj;
    }

    /**
     * The media features settings for a phone number.
     */
    public function withMediaFeatures(MediaFeatures $mediaFeatures): self
    {
        $obj = clone $this;
        $obj->media_features = $mediaFeatures;

        return $obj;
    }

    /**
     * Controls whether a tech prefix is enabled for this phone number.
     */
    public function withTechPrefixEnabled(bool $techPrefixEnabled): self
    {
        $obj = clone $this;
        $obj->tech_prefix_enabled = $techPrefixEnabled;

        return $obj;
    }

    /**
     * This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     */
    public function withTranslatedNumber(string $translatedNumber): self
    {
        $obj = clone $this;
        $obj->translated_number = $translatedNumber;

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
        $obj['usage_payment_method'] = $usagePaymentMethod;

        return $obj;
    }
}
