<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency\EmergencyStatus;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;

/**
 * @phpstan-type PhoneNumberWithVoiceSettingsShape = array{
 *   id?: string|null,
 *   callForwarding?: CallForwarding|null,
 *   callRecording?: CallRecording|null,
 *   cnamListing?: CnamListing|null,
 *   connectionID?: string|null,
 *   customerReference?: string|null,
 *   emergency?: Emergency|null,
 *   inboundCallScreening?: value-of<InboundCallScreening>|null,
 *   mediaFeatures?: MediaFeatures|null,
 *   phoneNumber?: string|null,
 *   recordType?: string|null,
 *   techPrefixEnabled?: bool|null,
 *   translatedNumber?: string|null,
 *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
 * }
 */
final class PhoneNumberWithVoiceSettings implements BaseModel
{
    /** @use SdkModel<PhoneNumberWithVoiceSettingsShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

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
     * The CNAM listing settings for a phone number.
     */
    #[Optional('cnam_listing')]
    public ?CnamListing $cnamListing;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * The emergency services settings for a phone number.
     */
    #[Optional]
    public ?Emergency $emergency;

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
     * The phone number in +E164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
     * @param Emergency|array{
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     * } $emergency
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     * @param MediaFeatures|array{
     *   acceptAnyRtpPacketsEnabled?: bool|null,
     *   rtpAutoAdjustEnabled?: bool|null,
     *   t38FaxGatewayEnabled?: bool|null,
     * } $mediaFeatures
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     */
    public static function with(
        ?string $id = null,
        CallForwarding|array|null $callForwarding = null,
        CallRecording|array|null $callRecording = null,
        CnamListing|array|null $cnamListing = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        Emergency|array|null $emergency = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        MediaFeatures|array|null $mediaFeatures = null,
        ?string $phoneNumber = null,
        ?string $recordType = null,
        ?bool $techPrefixEnabled = null,
        ?string $translatedNumber = null,
        UsagePaymentMethod|string|null $usagePaymentMethod = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $callForwarding && $self['callForwarding'] = $callForwarding;
        null !== $callRecording && $self['callRecording'] = $callRecording;
        null !== $cnamListing && $self['cnamListing'] = $cnamListing;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $emergency && $self['emergency'] = $emergency;
        null !== $inboundCallScreening && $self['inboundCallScreening'] = $inboundCallScreening;
        null !== $mediaFeatures && $self['mediaFeatures'] = $mediaFeatures;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $techPrefixEnabled && $self['techPrefixEnabled'] = $techPrefixEnabled;
        null !== $translatedNumber && $self['translatedNumber'] = $translatedNumber;
        null !== $usagePaymentMethod && $self['usagePaymentMethod'] = $usagePaymentMethod;

        return $self;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * The emergency services settings for a phone number.
     *
     * @param Emergency|array{
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     * } $emergency
     */
    public function withEmergency(Emergency|array $emergency): self
    {
        $self = clone $this;
        $self['emergency'] = $emergency;

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
     * The phone number in +E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
