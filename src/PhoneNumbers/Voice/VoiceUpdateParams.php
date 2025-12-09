<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;

/**
 * Update a phone number with voice settings.
 *
 * @see Telnyx\Services\PhoneNumbers\VoiceService::update()
 *
 * @phpstan-type VoiceUpdateParamsShape = array{
 *   callForwarding?: CallForwarding|array{
 *     callForwardingEnabled?: bool|null,
 *     forwardingType?: value-of<ForwardingType>|null,
 *     forwardsTo?: string|null,
 *   },
 *   callRecording?: CallRecording|array{
 *     inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>|null,
 *     inboundCallRecordingEnabled?: bool|null,
 *     inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>|null,
 *   },
 *   callerIDNameEnabled?: bool,
 *   cnamListing?: CnamListing|array{
 *     cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
 *   },
 *   inboundCallScreening?: InboundCallScreening|value-of<InboundCallScreening>,
 *   mediaFeatures?: MediaFeatures|array{
 *     acceptAnyRtpPacketsEnabled?: bool|null,
 *     rtpAutoAdjustEnabled?: bool|null,
 *     t38FaxGatewayEnabled?: bool|null,
 *   },
 *   techPrefixEnabled?: bool,
 *   translatedNumber?: string,
 *   usagePaymentMethod?: UsagePaymentMethod|value-of<UsagePaymentMethod>,
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
    #[Optional('call_forwarding')]
    public ?CallForwarding $callForwarding;

    /**
     * The call recording settings for a phone number.
     */
    #[Optional('call_recording')]
    public ?CallRecording $callRecording;

    /**
     * Controls whether the caller ID name is enabled for this phone number.
     */
    #[Optional('caller_id_name_enabled')]
    public ?bool $callerIDNameEnabled;

    /**
     * The CNAM listing settings for a phone number.
     */
    #[Optional('cnam_listing')]
    public ?CnamListing $cnamListing;

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @var value-of<InboundCallScreening>|null $inboundCallScreening
     */
    #[Optional('inbound_call_screening', enum: InboundCallScreening::class)]
    public ?string $inboundCallScreening;

    /**
     * The media features settings for a phone number.
     */
    #[Optional('media_features')]
    public ?MediaFeatures $mediaFeatures;

    /**
     * Controls whether a tech prefix is enabled for this phone number.
     */
    #[Optional('tech_prefix_enabled')]
    public ?bool $techPrefixEnabled;

    /**
     * This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     */
    #[Optional('translated_number')]
    public ?string $translatedNumber;

    /**
     * Controls whether a number is billed per minute or uses your concurrent channels.
     *
     * @var value-of<UsagePaymentMethod>|null $usagePaymentMethod
     */
    #[Optional('usage_payment_method', enum: UsagePaymentMethod::class)]
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
     * @param CallForwarding|array{
     *   callForwardingEnabled?: bool|null,
     *   forwardingType?: value-of<ForwardingType>|null,
     *   forwardsTo?: string|null,
     * } $callForwarding
     * @param CallRecording|array{
     *   inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>|null,
     *   inboundCallRecordingEnabled?: bool|null,
     *   inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>|null,
     * } $callRecording
     * @param CnamListing|array{
     *   cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
     * } $cnamListing
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     * @param MediaFeatures|array{
     *   acceptAnyRtpPacketsEnabled?: bool|null,
     *   rtpAutoAdjustEnabled?: bool|null,
     *   t38FaxGatewayEnabled?: bool|null,
     * } $mediaFeatures
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     */
    public static function with(
        CallForwarding|array|null $callForwarding = null,
        CallRecording|array|null $callRecording = null,
        ?bool $callerIDNameEnabled = null,
        CnamListing|array|null $cnamListing = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        MediaFeatures|array|null $mediaFeatures = null,
        ?bool $techPrefixEnabled = null,
        ?string $translatedNumber = null,
        UsagePaymentMethod|string|null $usagePaymentMethod = null,
    ): self {
        $obj = new self;

        null !== $callForwarding && $obj['callForwarding'] = $callForwarding;
        null !== $callRecording && $obj['callRecording'] = $callRecording;
        null !== $callerIDNameEnabled && $obj['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListing && $obj['cnamListing'] = $cnamListing;
        null !== $inboundCallScreening && $obj['inboundCallScreening'] = $inboundCallScreening;
        null !== $mediaFeatures && $obj['mediaFeatures'] = $mediaFeatures;
        null !== $techPrefixEnabled && $obj['techPrefixEnabled'] = $techPrefixEnabled;
        null !== $translatedNumber && $obj['translatedNumber'] = $translatedNumber;
        null !== $usagePaymentMethod && $obj['usagePaymentMethod'] = $usagePaymentMethod;

        return $obj;
    }

    /**
     * The call forwarding settings for a phone number.
     *
     * @param CallForwarding|array{
     *   callForwardingEnabled?: bool|null,
     *   forwardingType?: value-of<ForwardingType>|null,
     *   forwardsTo?: string|null,
     * } $callForwarding
     */
    public function withCallForwarding(
        CallForwarding|array $callForwarding
    ): self {
        $obj = clone $this;
        $obj['callForwarding'] = $callForwarding;

        return $obj;
    }

    /**
     * The call recording settings for a phone number.
     *
     * @param CallRecording|array{
     *   inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>|null,
     *   inboundCallRecordingEnabled?: bool|null,
     *   inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>|null,
     * } $callRecording
     */
    public function withCallRecording(CallRecording|array $callRecording): self
    {
        $obj = clone $this;
        $obj['callRecording'] = $callRecording;

        return $obj;
    }

    /**
     * Controls whether the caller ID name is enabled for this phone number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj['callerIDNameEnabled'] = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * The CNAM listing settings for a phone number.
     *
     * @param CnamListing|array{
     *   cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
     * } $cnamListing
     */
    public function withCnamListing(CnamListing|array $cnamListing): self
    {
        $obj = clone $this;
        $obj['cnamListing'] = $cnamListing;

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
     *
     * @param MediaFeatures|array{
     *   acceptAnyRtpPacketsEnabled?: bool|null,
     *   rtpAutoAdjustEnabled?: bool|null,
     *   t38FaxGatewayEnabled?: bool|null,
     * } $mediaFeatures
     */
    public function withMediaFeatures(MediaFeatures|array $mediaFeatures): self
    {
        $obj = clone $this;
        $obj['mediaFeatures'] = $mediaFeatures;

        return $obj;
    }

    /**
     * Controls whether a tech prefix is enabled for this phone number.
     */
    public function withTechPrefixEnabled(bool $techPrefixEnabled): self
    {
        $obj = clone $this;
        $obj['techPrefixEnabled'] = $techPrefixEnabled;

        return $obj;
    }

    /**
     * This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     */
    public function withTranslatedNumber(string $translatedNumber): self
    {
        $obj = clone $this;
        $obj['translatedNumber'] = $translatedNumber;

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
