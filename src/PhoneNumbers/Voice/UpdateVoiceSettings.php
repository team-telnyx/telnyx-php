<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\UsagePaymentMethod;

/**
 * @phpstan-type UpdateVoiceSettingsShape = array{
 *   callForwarding?: CallForwarding|null,
 *   callRecording?: CallRecording|null,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListing?: CnamListing|null,
 *   inboundCallScreening?: value-of<InboundCallScreening>|null,
 *   mediaFeatures?: MediaFeatures|null,
 *   techPrefixEnabled?: bool|null,
 *   translatedNumber?: string|null,
 *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
 * }
 */
final class UpdateVoiceSettings implements BaseModel
{
    /** @use SdkModel<UpdateVoiceSettingsShape> */
    use SdkModel;

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
        $self = new self;

        null !== $callForwarding && $self['callForwarding'] = $callForwarding;
        null !== $callRecording && $self['callRecording'] = $callRecording;
        null !== $callerIDNameEnabled && $self['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListing && $self['cnamListing'] = $cnamListing;
        null !== $inboundCallScreening && $self['inboundCallScreening'] = $inboundCallScreening;
        null !== $mediaFeatures && $self['mediaFeatures'] = $mediaFeatures;
        null !== $techPrefixEnabled && $self['techPrefixEnabled'] = $techPrefixEnabled;
        null !== $translatedNumber && $self['translatedNumber'] = $translatedNumber;
        null !== $usagePaymentMethod && $self['usagePaymentMethod'] = $usagePaymentMethod;

        return $self;
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
        $self = clone $this;
        $self['callForwarding'] = $callForwarding;

        return $self;
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
        $self = clone $this;
        $self['callRecording'] = $callRecording;

        return $self;
    }

    /**
     * Controls whether the caller ID name is enabled for this phone number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $self = clone $this;
        $self['callerIDNameEnabled'] = $callerIDNameEnabled;

        return $self;
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
        $self = clone $this;
        $self['cnamListing'] = $cnamListing;

        return $self;
    }

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     */
    public function withInboundCallScreening(
        InboundCallScreening|string $inboundCallScreening
    ): self {
        $self = clone $this;
        $self['inboundCallScreening'] = $inboundCallScreening;

        return $self;
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
        $self = clone $this;
        $self['mediaFeatures'] = $mediaFeatures;

        return $self;
    }

    /**
     * Controls whether a tech prefix is enabled for this phone number.
     */
    public function withTechPrefixEnabled(bool $techPrefixEnabled): self
    {
        $self = clone $this;
        $self['techPrefixEnabled'] = $techPrefixEnabled;

        return $self;
    }

    /**
     * This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     */
    public function withTranslatedNumber(string $translatedNumber): self
    {
        $self = clone $this;
        $self['translatedNumber'] = $translatedNumber;

        return $self;
    }

    /**
     * Controls whether a number is billed per minute or uses your concurrent channels.
     *
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     */
    public function withUsagePaymentMethod(
        UsagePaymentMethod|string $usagePaymentMethod
    ): self {
        $self = clone $this;
        $self['usagePaymentMethod'] = $usagePaymentMethod;

        return $self;
    }
}
