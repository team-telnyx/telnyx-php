<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   billing_group_id?: string|null,
 *   call_forwarding_enabled?: bool|null,
 *   call_recording_enabled?: bool|null,
 *   caller_id_name_enabled?: bool|null,
 *   cnam_listing_enabled?: bool|null,
 *   connection_id?: string|null,
 *   connection_name?: string|null,
 *   created_at?: string|null,
 *   customer_reference?: string|null,
 *   deletion_lock_enabled?: bool|null,
 *   emergency_address_id?: string|null,
 *   emergency_enabled?: bool|null,
 *   external_pin?: string|null,
 *   messaging_profile_id?: string|null,
 *   messaging_profile_name?: string|null,
 *   phone_number?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   purchased_at?: string|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 *   t38_fax_gateway_enabled?: bool|null,
 *   tags?: list<string>|null,
 *   updated_at?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

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
     * The user-assigned name of the connection to be associated with this phone number.
     */
    #[Api(optional: true)]
    public ?string $connection_name;

    /**
     * ISO 8601 formatted date indicating when the time it took to activate after the purchase.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    #[Api(optional: true)]
    public ?bool $deletion_lock_enabled;

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
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Api(optional: true)]
    public ?string $external_pin;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    /**
     * The name of the messaging profile associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $messaging_profile_name;

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * The phone number's type.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * ISO 8601 formatted date indicating the time the request was made to purchase the number.
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

    /**
     * A list of user-assigned tags to help manage the phone number.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
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
        ?string $created_at = null,
        ?string $customer_reference = null,
        ?bool $deletion_lock_enabled = null,
        ?string $emergency_address_id = null,
        ?bool $emergency_enabled = null,
        ?string $external_pin = null,
        ?string $messaging_profile_id = null,
        ?string $messaging_profile_name = null,
        ?string $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $purchased_at = null,
        ?string $record_type = null,
        Status|string|null $status = null,
        ?bool $t38_fax_gateway_enabled = null,
        ?array $tags = null,
        ?string $updated_at = null,
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
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $deletion_lock_enabled && $obj['deletion_lock_enabled'] = $deletion_lock_enabled;
        null !== $emergency_address_id && $obj['emergency_address_id'] = $emergency_address_id;
        null !== $emergency_enabled && $obj['emergency_enabled'] = $emergency_enabled;
        null !== $external_pin && $obj['external_pin'] = $external_pin;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $messaging_profile_name && $obj['messaging_profile_name'] = $messaging_profile_name;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $purchased_at && $obj['purchased_at'] = $purchased_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $t38_fax_gateway_enabled && $obj['t38_fax_gateway_enabled'] = $t38_fax_gateway_enabled;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
     * ISO 8601 formatted date indicating when the time it took to activate after the purchase.
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
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj['external_pin'] = $externalPin;

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
     * ISO 8601 formatted date indicating the time the request was made to purchase the number.
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

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
