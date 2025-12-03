<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Status;

/**
 * @phpstan-type PhoneNumberSlimListResponseShape = array{
 *   id?: string|null,
 *   billing_group_id?: string|null,
 *   call_forwarding_enabled?: bool|null,
 *   call_recording_enabled?: bool|null,
 *   caller_id_name_enabled?: bool|null,
 *   cnam_listing_enabled?: bool|null,
 *   connection_id?: string|null,
 *   country_iso_alpha2?: string|null,
 *   created_at?: string|null,
 *   customer_reference?: string|null,
 *   emergency_address_id?: string|null,
 *   emergency_enabled?: bool|null,
 *   emergency_status?: value-of<EmergencyStatus>|null,
 *   external_pin?: string|null,
 *   inbound_call_screening?: value-of<InboundCallScreening>|null,
 *   phone_number?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   purchased_at?: string|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 *   t38_fax_gateway_enabled?: bool|null,
 * }
 */
final class PhoneNumberSlimListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PhoneNumberSlimListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $billing_group_id;

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    #[Api(optional: true)]
    public ?bool $call_forwarding_enabled;

    /**
     * Indicates whether call recording is enabled for this number.
     */
    #[Api(optional: true)]
    public ?bool $call_recording_enabled;

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    #[Api(optional: true)]
    public ?bool $caller_id_name_enabled;

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    #[Api(optional: true)]
    public ?bool $cnam_listing_enabled;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Api(optional: true)]
    public ?string $country_iso_alpha2;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Identifies the emergency address associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $emergency_address_id;

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    #[Api(optional: true)]
    public ?bool $emergency_enabled;

    /**
     * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
     *
     * @var value-of<EmergencyStatus>|null $emergency_status
     */
    #[Api(enum: EmergencyStatus::class, optional: true)]
    public ?string $emergency_status;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Api(optional: true)]
    public ?string $external_pin;

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @var value-of<InboundCallScreening>|null $inbound_call_screening
     */
    #[Api(enum: InboundCallScreening::class, optional: true)]
    public ?string $inbound_call_screening;

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * The phone number's type.
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * ISO 8601 formatted date indicating when the resource was purchased.
     */
    #[Api(optional: true)]
    public ?string $purchased_at;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The phone number's current status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Indicates whether T38 Fax Gateway for inbound calls to this number.
     */
    #[Api(optional: true)]
    public ?bool $t38_fax_gateway_enabled;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergency_status
     * @param InboundCallScreening|value-of<InboundCallScreening> $inbound_call_screening
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $billing_group_id = null,
        ?bool $call_forwarding_enabled = null,
        ?bool $call_recording_enabled = null,
        ?bool $caller_id_name_enabled = null,
        ?bool $cnam_listing_enabled = null,
        ?string $connection_id = null,
        ?string $country_iso_alpha2 = null,
        ?string $created_at = null,
        ?string $customer_reference = null,
        ?string $emergency_address_id = null,
        ?bool $emergency_enabled = null,
        EmergencyStatus|string|null $emergency_status = null,
        ?string $external_pin = null,
        InboundCallScreening|string|null $inbound_call_screening = null,
        ?string $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $purchased_at = null,
        ?string $record_type = null,
        Status|string|null $status = null,
        ?bool $t38_fax_gateway_enabled = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $call_forwarding_enabled && $obj->call_forwarding_enabled = $call_forwarding_enabled;
        null !== $call_recording_enabled && $obj->call_recording_enabled = $call_recording_enabled;
        null !== $caller_id_name_enabled && $obj->caller_id_name_enabled = $caller_id_name_enabled;
        null !== $cnam_listing_enabled && $obj->cnam_listing_enabled = $cnam_listing_enabled;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $country_iso_alpha2 && $obj->country_iso_alpha2 = $country_iso_alpha2;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $emergency_address_id && $obj->emergency_address_id = $emergency_address_id;
        null !== $emergency_enabled && $obj->emergency_enabled = $emergency_enabled;
        null !== $emergency_status && $obj['emergency_status'] = $emergency_status;
        null !== $external_pin && $obj->external_pin = $external_pin;
        null !== $inbound_call_screening && $obj['inbound_call_screening'] = $inbound_call_screening;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $purchased_at && $obj->purchased_at = $purchased_at;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $t38_fax_gateway_enabled && $obj->t38_fax_gateway_enabled = $t38_fax_gateway_enabled;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billing_group_id = $billingGroupID;

        return $obj;
    }

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj->call_forwarding_enabled = $callForwardingEnabled;

        return $obj;
    }

    /**
     * Indicates whether call recording is enabled for this number.
     */
    public function withCallRecordingEnabled(bool $callRecordingEnabled): self
    {
        $obj = clone $this;
        $obj->call_recording_enabled = $callRecordingEnabled;

        return $obj;
    }

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj->caller_id_name_enabled = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $obj = clone $this;
        $obj->cnam_listing_enabled = $cnamListingEnabled;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj->country_iso_alpha2 = $countryISOAlpha2;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
     * Identifies the emergency address associated with the phone number.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj->emergency_address_id = $emergencyAddressID;

        return $obj;
    }

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj->emergency_enabled = $emergencyEnabled;

        return $obj;
    }

    /**
     * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergencyStatus
     */
    public function withEmergencyStatus(
        EmergencyStatus|string $emergencyStatus
    ): self {
        $obj = clone $this;
        $obj['emergency_status'] = $emergencyStatus;

        return $obj;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj->external_pin = $externalPin;

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
     * The +E.164-formatted phone number associated with this record.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * The phone number's type.
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was purchased.
     */
    public function withPurchasedAt(string $purchasedAt): self
    {
        $obj = clone $this;
        $obj->purchased_at = $purchasedAt;

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
     * The phone number's current status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Indicates whether T38 Fax Gateway for inbound calls to this number.
     */
    public function withT38FaxGatewayEnabled(bool $t38FaxGatewayEnabled): self
    {
        $obj = clone $this;
        $obj->t38_fax_gateway_enabled = $t38FaxGatewayEnabled;

        return $obj;
    }
}
