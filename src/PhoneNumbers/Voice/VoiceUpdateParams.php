<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
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
 * @phpstan-import-type CallForwardingShape from \Telnyx\PhoneNumbers\Voice\CallForwarding
 * @phpstan-import-type CallRecordingShape from \Telnyx\PhoneNumbers\Voice\CallRecording
 * @phpstan-import-type CnamListingShape from \Telnyx\PhoneNumbers\Voice\CnamListing
 * @phpstan-import-type MediaFeaturesShape from \Telnyx\PhoneNumbers\Voice\MediaFeatures
 *
 * @phpstan-type VoiceUpdateParamsShape = array{
 *   callForwarding?: null|CallForwarding|CallForwardingShape,
 *   callRecording?: null|CallRecording|CallRecordingShape,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListing?: null|CnamListing|CnamListingShape,
 *   inboundCallScreening?: null|InboundCallScreening|value-of<InboundCallScreening>,
 *   mediaFeatures?: null|MediaFeatures|MediaFeaturesShape,
 *   techPrefixEnabled?: bool|null,
 *   translatedNumber?: string|null,
 *   usagePaymentMethod?: null|UsagePaymentMethod|value-of<UsagePaymentMethod>,
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
     * @param CallForwarding|CallForwardingShape|null $callForwarding
     * @param CallRecording|CallRecordingShape|null $callRecording
     * @param CnamListing|CnamListingShape|null $cnamListing
     * @param InboundCallScreening|value-of<InboundCallScreening>|null $inboundCallScreening
     * @param MediaFeatures|MediaFeaturesShape|null $mediaFeatures
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod>|null $usagePaymentMethod
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
     * @param CallForwarding|CallForwardingShape $callForwarding
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
     * @param CallRecording|CallRecordingShape $callRecording
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
     * @param CnamListing|CnamListingShape $cnamListing
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
     * @param MediaFeatures|MediaFeaturesShape $mediaFeatures
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
