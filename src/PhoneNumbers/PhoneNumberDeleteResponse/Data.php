<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\Status;

/**
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   billingGroupID?: string,
 *   callForwardingEnabled?: bool,
 *   callRecordingEnabled?: bool,
 *   callerIDNameEnabled?: bool,
 *   cnamListingEnabled?: bool,
 *   connectionID?: string,
 *   connectionName?: string,
 *   createdAt?: string,
 *   customerReference?: string,
 *   deletionLockEnabled?: bool,
 *   emergencyAddressID?: string,
 *   emergencyEnabled?: bool,
 *   externalPin?: string,
 *   messagingProfileID?: string,
 *   messagingProfileName?: string,
 *   phoneNumber?: string,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   purchasedAt?: string,
 *   recordType?: string,
 *   status?: value-of<Status>,
 *   t38FaxGatewayEnabled?: bool,
 *   tags?: list<string>,
 *   updatedAt?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    #[Api('call_forwarding_enabled', optional: true)]
    public ?bool $callForwardingEnabled;

    /**
     * Indicates whether call recording is enabled for this number.
     */
    #[Api('call_recording_enabled', optional: true)]
    public ?bool $callRecordingEnabled;

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    #[Api('caller_id_name_enabled', optional: true)]
    public ?bool $callerIDNameEnabled;

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    #[Api('cnam_listing_enabled', optional: true)]
    public ?bool $cnamListingEnabled;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    #[Api('connection_name', optional: true)]
    public ?string $connectionName;

    /**
     * ISO 8601 formatted date indicating when the time it took to activate after the purchase.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    #[Api('deletion_lock_enabled', optional: true)]
    public ?bool $deletionLockEnabled;

    /**
     * Identifies the emergency address associated with the phone number.
     */
    #[Api('emergency_address_id', optional: true)]
    public ?string $emergencyAddressID;

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    #[Api('emergency_enabled', optional: true)]
    public ?bool $emergencyEnabled;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Api('external_pin', optional: true)]
    public ?string $externalPin;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

    /**
     * The name of the messaging profile associated with the phone number.
     */
    #[Api('messaging_profile_name', optional: true)]
    public ?string $messagingProfileName;

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * The phone number's type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * ISO 8601 formatted date indicating the time the request was made to purchase the number.
     */
    #[Api('purchased_at', optional: true)]
    public ?string $purchasedAt;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
    #[Api('t38_fax_gateway_enabled', optional: true)]
    public ?bool $t38FaxGatewayEnabled;

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
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param Status|value-of<Status> $status
     * @param list<string> $tags
     */
    public static function with(
        ?string $id = null,
        ?string $billingGroupID = null,
        ?bool $callForwardingEnabled = null,
        ?bool $callRecordingEnabled = null,
        ?bool $callerIDNameEnabled = null,
        ?bool $cnamListingEnabled = null,
        ?string $connectionID = null,
        ?string $connectionName = null,
        ?string $createdAt = null,
        ?string $customerReference = null,
        ?bool $deletionLockEnabled = null,
        ?string $emergencyAddressID = null,
        ?bool $emergencyEnabled = null,
        ?string $externalPin = null,
        ?string $messagingProfileID = null,
        ?string $messagingProfileName = null,
        ?string $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $purchasedAt = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?bool $t38FaxGatewayEnabled = null,
        ?array $tags = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $callForwardingEnabled && $obj->callForwardingEnabled = $callForwardingEnabled;
        null !== $callRecordingEnabled && $obj->callRecordingEnabled = $callRecordingEnabled;
        null !== $callerIDNameEnabled && $obj->callerIDNameEnabled = $callerIDNameEnabled;
        null !== $cnamListingEnabled && $obj->cnamListingEnabled = $cnamListingEnabled;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $connectionName && $obj->connectionName = $connectionName;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $deletionLockEnabled && $obj->deletionLockEnabled = $deletionLockEnabled;
        null !== $emergencyAddressID && $obj->emergencyAddressID = $emergencyAddressID;
        null !== $emergencyEnabled && $obj->emergencyEnabled = $emergencyEnabled;
        null !== $externalPin && $obj->externalPin = $externalPin;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $messagingProfileName && $obj->messagingProfileName = $messagingProfileName;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $purchasedAt && $obj->purchasedAt = $purchasedAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $t38FaxGatewayEnabled && $obj->t38FaxGatewayEnabled = $t38FaxGatewayEnabled;
        null !== $tags && $obj->tags = $tags;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj->callForwardingEnabled = $callForwardingEnabled;

        return $obj;
    }

    /**
     * Indicates whether call recording is enabled for this number.
     */
    public function withCallRecordingEnabled(bool $callRecordingEnabled): self
    {
        $obj = clone $this;
        $obj->callRecordingEnabled = $callRecordingEnabled;

        return $obj;
    }

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj->callerIDNameEnabled = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $obj = clone $this;
        $obj->cnamListingEnabled = $cnamListingEnabled;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj->connectionName = $connectionName;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the time it took to activate after the purchase.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    public function withDeletionLockEnabled(bool $deletionLockEnabled): self
    {
        $obj = clone $this;
        $obj->deletionLockEnabled = $deletionLockEnabled;

        return $obj;
    }

    /**
     * Identifies the emergency address associated with the phone number.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj->emergencyAddressID = $emergencyAddressID;

        return $obj;
    }

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj->emergencyEnabled = $emergencyEnabled;

        return $obj;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj->externalPin = $externalPin;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * The name of the messaging profile associated with the phone number.
     */
    public function withMessagingProfileName(string $messagingProfileName): self
    {
        $obj = clone $this;
        $obj->messagingProfileName = $messagingProfileName;

        return $obj;
    }

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

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
        $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating the time the request was made to purchase the number.
     */
    public function withPurchasedAt(string $purchasedAt): self
    {
        $obj = clone $this;
        $obj->purchasedAt = $purchasedAt;

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
     * The phone number's current status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Indicates whether T38 Fax Gateway for inbound calls to this number.
     */
    public function withT38FaxGatewayEnabled(bool $t38FaxGatewayEnabled): self
    {
        $obj = clone $this;
        $obj->t38FaxGatewayEnabled = $t38FaxGatewayEnabled;

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
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
