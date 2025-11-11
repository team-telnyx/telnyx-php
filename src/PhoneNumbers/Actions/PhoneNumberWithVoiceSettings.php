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
 * @phpstan-type PhoneNumberWithVoiceSettingsShape = array{
 *   id?: string|null,
 *   call_forwarding?: CallForwarding|null,
 *   call_recording?: CallRecording|null,
 *   cnam_listing?: CnamListing|null,
 *   connection_id?: string|null,
 *   customer_reference?: string|null,
 *   emergency?: Emergency|null,
 *   inbound_call_screening?: value-of<InboundCallScreening>|null,
 *   media_features?: MediaFeatures|null,
 *   phone_number?: string|null,
 *   record_type?: string|null,
 *   tech_prefix_enabled?: bool|null,
 *   translated_number?: string|null,
 *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
 * }
 */
final class PhoneNumberWithVoiceSettings implements BaseModel
{
    /** @use SdkModel<PhoneNumberWithVoiceSettingsShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

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
     * The CNAM listing settings for a phone number.
     */
    #[Api(optional: true)]
    public ?CnamListing $cnam_listing;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * The emergency services settings for a phone number.
     */
    #[Api(optional: true)]
    public ?Emergency $emergency;

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
     * The phone number in +E164 format.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?string $id = null,
        ?CallForwarding $call_forwarding = null,
        ?CallRecording $call_recording = null,
        ?CnamListing $cnam_listing = null,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        ?Emergency $emergency = null,
        InboundCallScreening|string|null $inbound_call_screening = null,
        ?MediaFeatures $media_features = null,
        ?string $phone_number = null,
        ?string $record_type = null,
        ?bool $tech_prefix_enabled = null,
        ?string $translated_number = null,
        UsagePaymentMethod|string|null $usage_payment_method = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $call_forwarding && $obj->call_forwarding = $call_forwarding;
        null !== $call_recording && $obj->call_recording = $call_recording;
        null !== $cnam_listing && $obj->cnam_listing = $cnam_listing;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $emergency && $obj->emergency = $emergency;
        null !== $inbound_call_screening && $obj['inbound_call_screening'] = $inbound_call_screening;
        null !== $media_features && $obj->media_features = $media_features;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $tech_prefix_enabled && $obj->tech_prefix_enabled = $tech_prefix_enabled;
        null !== $translated_number && $obj->translated_number = $translated_number;
        null !== $usage_payment_method && $obj['usage_payment_method'] = $usage_payment_method;

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
     * The CNAM listing settings for a phone number.
     */
    public function withCnamListing(CnamListing $cnamListing): self
    {
        $obj = clone $this;
        $obj->cnam_listing = $cnamListing;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

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
     * The phone number in +E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
