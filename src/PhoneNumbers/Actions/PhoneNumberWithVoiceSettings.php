<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;

/**
 * @phpstan-type phone_number_with_voice_settings = array{
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
    /** @use SdkModel<phone_number_with_voice_settings> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

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
     * The CNAM listing settings for a phone number.
     */
    #[Api('cnam_listing', optional: true)]
    public ?CnamListing $cnamListing;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * The emergency services settings for a phone number.
     */
    #[Api(optional: true)]
    public ?Emergency $emergency;

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
     * The phone number in +E164 format.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
        ?string $id = null,
        ?CallForwarding $callForwarding = null,
        ?CallRecording $callRecording = null,
        ?CnamListing $cnamListing = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?Emergency $emergency = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?MediaFeatures $mediaFeatures = null,
        ?string $phoneNumber = null,
        ?string $recordType = null,
        ?bool $techPrefixEnabled = null,
        ?string $translatedNumber = null,
        UsagePaymentMethod|string|null $usagePaymentMethod = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $callForwarding && $obj->callForwarding = $callForwarding;
        null !== $callRecording && $obj->callRecording = $callRecording;
        null !== $cnamListing && $obj->cnamListing = $cnamListing;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $emergency && $obj->emergency = $emergency;
        null !== $inboundCallScreening && $obj->inboundCallScreening = $inboundCallScreening instanceof InboundCallScreening ? $inboundCallScreening->value : $inboundCallScreening;
        null !== $mediaFeatures && $obj->mediaFeatures = $mediaFeatures;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $techPrefixEnabled && $obj->techPrefixEnabled = $techPrefixEnabled;
        null !== $translatedNumber && $obj->translatedNumber = $translatedNumber;
        null !== $usagePaymentMethod && $obj->usagePaymentMethod = $usagePaymentMethod instanceof UsagePaymentMethod ? $usagePaymentMethod->value : $usagePaymentMethod;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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
     * The CNAM listing settings for a phone number.
     */
    public function withCnamListing(CnamListing $cnamListing): self
    {
        $obj = clone $this;
        $obj->cnamListing = $cnamListing;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * The emergency services settings for a phone number.
     */
    public function withEmergency(Emergency $emergency): self
    {
        $obj = clone $this;
        $obj->emergency = $emergency;

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
        $obj->inboundCallScreening = $inboundCallScreening instanceof InboundCallScreening ? $inboundCallScreening->value : $inboundCallScreening;

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
     * The phone number in +E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
        $obj->usagePaymentMethod = $usagePaymentMethod instanceof UsagePaymentMethod ? $usagePaymentMethod->value : $usagePaymentMethod;

        return $obj;
    }
}
