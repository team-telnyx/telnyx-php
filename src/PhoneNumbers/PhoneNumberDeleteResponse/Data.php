<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   billingGroupID?: string|null,
 *   callForwardingEnabled?: bool|null,
 *   callRecordingEnabled?: bool|null,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListingEnabled?: bool|null,
 *   connectionID?: string|null,
 *   connectionName?: string|null,
 *   createdAt?: string|null,
 *   customerReference?: string|null,
 *   deletionLockEnabled?: bool|null,
 *   emergencyAddressID?: string|null,
 *   emergencyEnabled?: bool|null,
 *   externalPin?: string|null,
 *   messagingProfileID?: string|null,
 *   messagingProfileName?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   purchasedAt?: string|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   t38FaxGatewayEnabled?: bool|null,
 *   tags?: list<string>|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    #[Optional('call_forwarding_enabled')]
    public ?bool $callForwardingEnabled;

    /**
     * Indicates whether call recording is enabled for this number.
     */
    #[Optional('call_recording_enabled')]
    public ?bool $callRecordingEnabled;

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    #[Optional('caller_id_name_enabled')]
    public ?bool $callerIDNameEnabled;

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    #[Optional('cnam_listing_enabled')]
    public ?bool $cnamListingEnabled;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    #[Optional('connection_name')]
    public ?string $connectionName;

    /**
     * ISO 8601 formatted date indicating when the time it took to activate after the purchase.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    #[Optional('deletion_lock_enabled')]
    public ?bool $deletionLockEnabled;

    /**
     * Identifies the emergency address associated with the phone number.
     */
    #[Optional('emergency_address_id')]
    public ?string $emergencyAddressID;

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    #[Optional('emergency_enabled')]
    public ?bool $emergencyEnabled;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Optional('external_pin')]
    public ?string $externalPin;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * The name of the messaging profile associated with the phone number.
     */
    #[Optional('messaging_profile_name')]
    public ?string $messagingProfileName;

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * The phone number's type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    /**
     * ISO 8601 formatted date indicating the time the request was made to purchase the number.
     */
    #[Optional('purchased_at')]
    public ?string $purchasedAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
    #[Optional('t38_fax_gateway_enabled')]
    public ?bool $t38FaxGatewayEnabled;

    /**
     * A list of user-assigned tags to help manage the phone number.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
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
     * @param PhoneNumberType|value-of<PhoneNumberType>|null $phoneNumberType
     * @param Status|value-of<Status>|null $status
     * @param list<string>|null $tags
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $callForwardingEnabled && $self['callForwardingEnabled'] = $callForwardingEnabled;
        null !== $callRecordingEnabled && $self['callRecordingEnabled'] = $callRecordingEnabled;
        null !== $callerIDNameEnabled && $self['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListingEnabled && $self['cnamListingEnabled'] = $cnamListingEnabled;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $deletionLockEnabled && $self['deletionLockEnabled'] = $deletionLockEnabled;
        null !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        null !== $emergencyEnabled && $self['emergencyEnabled'] = $emergencyEnabled;
        null !== $externalPin && $self['externalPin'] = $externalPin;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $messagingProfileName && $self['messagingProfileName'] = $messagingProfileName;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $purchasedAt && $self['purchasedAt'] = $purchasedAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $t38FaxGatewayEnabled && $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;
        null !== $tags && $self['tags'] = $tags;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $self = clone $this;
        $self['callForwardingEnabled'] = $callForwardingEnabled;

        return $self;
    }

    /**
     * Indicates whether call recording is enabled for this number.
     */
    public function withCallRecordingEnabled(bool $callRecordingEnabled): self
    {
        $self = clone $this;
        $self['callRecordingEnabled'] = $callRecordingEnabled;

        return $self;
    }

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $self = clone $this;
        $self['callerIDNameEnabled'] = $callerIDNameEnabled;

        return $self;
    }

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $self = clone $this;
        $self['cnamListingEnabled'] = $cnamListingEnabled;

        return $self;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    public function withConnectionName(string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the time it took to activate after the purchase.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    public function withDeletionLockEnabled(bool $deletionLockEnabled): self
    {
        $self = clone $this;
        $self['deletionLockEnabled'] = $deletionLockEnabled;

        return $self;
    }

    /**
     * Identifies the emergency address associated with the phone number.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $self = clone $this;
        $self['emergencyAddressID'] = $emergencyAddressID;

        return $self;
    }

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $self = clone $this;
        $self['emergencyEnabled'] = $emergencyEnabled;

        return $self;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $self = clone $this;
        $self['externalPin'] = $externalPin;

        return $self;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The name of the messaging profile associated with the phone number.
     */
    public function withMessagingProfileName(string $messagingProfileName): self
    {
        $self = clone $this;
        $self['messagingProfileName'] = $messagingProfileName;

        return $self;
    }

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The phone number's type.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating the time the request was made to purchase the number.
     */
    public function withPurchasedAt(string $purchasedAt): self
    {
        $self = clone $this;
        $self['purchasedAt'] = $purchasedAt;

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
     * The phone number's current status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Indicates whether T38 Fax Gateway for inbound calls to this number.
     */
    public function withT38FaxGatewayEnabled(bool $t38FaxGatewayEnabled): self
    {
        $self = clone $this;
        $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

        return $self;
    }

    /**
     * A list of user-assigned tags to help manage the phone number.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
