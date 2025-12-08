<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\SourceType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\Status;

/**
 * @phpstan-type PhoneNumberDetailedShape = array{
 *   id?: string|null,
 *   billing_group_id?: string|null,
 *   call_forwarding_enabled?: bool|null,
 *   call_recording_enabled?: bool|null,
 *   caller_id_name_enabled?: bool|null,
 *   cnam_listing_enabled?: bool|null,
 *   connection_id?: string|null,
 *   connection_name?: string|null,
 *   country_iso_alpha2?: string|null,
 *   created_at?: string|null,
 *   customer_reference?: string|null,
 *   deletion_lock_enabled?: bool|null,
 *   emergency_address_id?: string|null,
 *   emergency_enabled?: bool|null,
 *   emergency_status?: value-of<EmergencyStatus>|null,
 *   external_pin?: string|null,
 *   inbound_call_screening?: value-of<InboundCallScreening>|null,
 *   messaging_profile_id?: string|null,
 *   messaging_profile_name?: string|null,
 *   phone_number?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   purchased_at?: string|null,
 *   record_type?: string|null,
 *   source_type?: value-of<SourceType>|null,
 *   status?: value-of<Status>|null,
 *   t38_fax_gateway_enabled?: bool|null,
 *   tags?: list<string>|null,
 * }
 */
final class PhoneNumberDetailed implements BaseModel
{
    /** @use SdkModel<PhoneNumberDetailedShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Optional]
    public ?string $billing_group_id;

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    #[Optional]
    public ?bool $call_forwarding_enabled;

    /**
     * Indicates whether call recording is enabled for this number.
     */
    #[Optional]
    public ?bool $call_recording_enabled;

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    #[Optional]
    public ?bool $caller_id_name_enabled;

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    #[Optional]
    public ?bool $cnam_listing_enabled;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    #[Optional]
    public ?string $connection_name;

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Optional]
    public ?string $country_iso_alpha2;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    #[Optional]
    public ?bool $deletion_lock_enabled;

    /**
     * Identifies the emergency address associated with the phone number.
     */
    #[Optional]
    public ?string $emergency_address_id;

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    #[Optional]
    public ?bool $emergency_enabled;

    /**
     * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
     *
     * @var value-of<EmergencyStatus>|null $emergency_status
     */
    #[Optional(enum: EmergencyStatus::class)]
    public ?string $emergency_status;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Optional]
    public ?string $external_pin;

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @var value-of<InboundCallScreening>|null $inbound_call_screening
     */
    #[Optional(enum: InboundCallScreening::class)]
    public ?string $inbound_call_screening;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Optional]
    public ?string $messaging_profile_id;

    /**
     * The name of the messaging profile associated with the phone number.
     */
    #[Optional]
    public ?string $messaging_profile_name;

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * The phone number's type.
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Optional(enum: PhoneNumberType::class)]
    public ?string $phone_number_type;

    /**
     * ISO 8601 formatted date indicating when the resource was purchased.
     */
    #[Optional]
    public ?string $purchased_at;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Indicates if the phone number was purchased or ported in. For some numbers this information may not be available.
     *
     * @var value-of<SourceType>|null $source_type
     */
    #[Optional(enum: SourceType::class, nullable: true)]
    public ?string $source_type;

    /**
     * The phone number's current status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Indicates whether T38 Fax Gateway for inbound calls to this number.
     */
    #[Optional]
    public ?bool $t38_fax_gateway_enabled;

    /**
     * A list of user-assigned tags to help manage the phone number.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

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
     * @param SourceType|value-of<SourceType>|null $source_type
     * @param Status|value-of<Status> $status
     * @param list<string> $tags
     */
    public static function with(
        ?string $id = null,
        ?string $billing_group_id = null,
        ?bool $call_forwarding_enabled = null,
        ?bool $call_recording_enabled = null,
        ?bool $caller_id_name_enabled = null,
        ?bool $cnam_listing_enabled = null,
        ?string $connection_id = null,
        ?string $connection_name = null,
        ?string $country_iso_alpha2 = null,
        ?string $created_at = null,
        ?string $customer_reference = null,
        ?bool $deletion_lock_enabled = null,
        ?string $emergency_address_id = null,
        ?bool $emergency_enabled = null,
        EmergencyStatus|string|null $emergency_status = null,
        ?string $external_pin = null,
        InboundCallScreening|string|null $inbound_call_screening = null,
        ?string $messaging_profile_id = null,
        ?string $messaging_profile_name = null,
        ?string $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $purchased_at = null,
        ?string $record_type = null,
        SourceType|string|null $source_type = null,
        Status|string|null $status = null,
        ?bool $t38_fax_gateway_enabled = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $call_forwarding_enabled && $obj['call_forwarding_enabled'] = $call_forwarding_enabled;
        null !== $call_recording_enabled && $obj['call_recording_enabled'] = $call_recording_enabled;
        null !== $caller_id_name_enabled && $obj['caller_id_name_enabled'] = $caller_id_name_enabled;
        null !== $cnam_listing_enabled && $obj['cnam_listing_enabled'] = $cnam_listing_enabled;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $country_iso_alpha2 && $obj['country_iso_alpha2'] = $country_iso_alpha2;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $deletion_lock_enabled && $obj['deletion_lock_enabled'] = $deletion_lock_enabled;
        null !== $emergency_address_id && $obj['emergency_address_id'] = $emergency_address_id;
        null !== $emergency_enabled && $obj['emergency_enabled'] = $emergency_enabled;
        null !== $emergency_status && $obj['emergency_status'] = $emergency_status;
        null !== $external_pin && $obj['external_pin'] = $external_pin;
        null !== $inbound_call_screening && $obj['inbound_call_screening'] = $inbound_call_screening;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $messaging_profile_name && $obj['messaging_profile_name'] = $messaging_profile_name;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $purchased_at && $obj['purchased_at'] = $purchased_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $source_type && $obj['source_type'] = $source_type;
        null !== $status && $obj['status'] = $status;
        null !== $t38_fax_gateway_enabled && $obj['t38_fax_gateway_enabled'] = $t38_fax_gateway_enabled;
        null !== $tags && $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billing_group_id'] = $billingGroupID;

        return $obj;
    }

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj['call_forwarding_enabled'] = $callForwardingEnabled;

        return $obj;
    }

    /**
     * Indicates whether call recording is enabled for this number.
     */
    public function withCallRecordingEnabled(bool $callRecordingEnabled): self
    {
        $obj = clone $this;
        $obj['call_recording_enabled'] = $callRecordingEnabled;

        return $obj;
    }

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj['caller_id_name_enabled'] = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $obj = clone $this;
        $obj['cnam_listing_enabled'] = $cnamListingEnabled;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj['country_iso_alpha2'] = $countryISOAlpha2;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    public function withDeletionLockEnabled(bool $deletionLockEnabled): self
    {
        $obj = clone $this;
        $obj['deletion_lock_enabled'] = $deletionLockEnabled;

        return $obj;
    }

    /**
     * Identifies the emergency address associated with the phone number.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergency_address_id'] = $emergencyAddressID;

        return $obj;
    }

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj['emergency_enabled'] = $emergencyEnabled;

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
        $obj['external_pin'] = $externalPin;

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
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }

    /**
     * The name of the messaging profile associated with the phone number.
     */
    public function withMessagingProfileName(string $messagingProfileName): self
    {
        $obj = clone $this;
        $obj['messaging_profile_name'] = $messagingProfileName;

        return $obj;
    }

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
        $obj['purchased_at'] = $purchasedAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Indicates if the phone number was purchased or ported in. For some numbers this information may not be available.
     *
     * @param SourceType|value-of<SourceType>|null $sourceType
     */
    public function withSourceType(SourceType|string|null $sourceType): self
    {
        $obj = clone $this;
        $obj['source_type'] = $sourceType;

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
        $obj['t38_fax_gateway_enabled'] = $t38FaxGatewayEnabled;

        return $obj;
    }

    /**
     * A list of user-assigned tags to help manage the phone number.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }
}
