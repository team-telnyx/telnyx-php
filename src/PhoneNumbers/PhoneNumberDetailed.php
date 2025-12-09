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
 *   billingGroupID?: string|null,
 *   callForwardingEnabled?: bool|null,
 *   callRecordingEnabled?: bool|null,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListingEnabled?: bool|null,
 *   connectionID?: string|null,
 *   connectionName?: string|null,
 *   countryISOAlpha2?: string|null,
 *   createdAt?: string|null,
 *   customerReference?: string|null,
 *   deletionLockEnabled?: bool|null,
 *   emergencyAddressID?: string|null,
 *   emergencyEnabled?: bool|null,
 *   emergencyStatus?: value-of<EmergencyStatus>|null,
 *   externalPin?: string|null,
 *   inboundCallScreening?: value-of<InboundCallScreening>|null,
 *   messagingProfileID?: string|null,
 *   messagingProfileName?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   purchasedAt?: string|null,
 *   recordType?: string|null,
 *   sourceType?: value-of<SourceType>|null,
 *   status?: value-of<Status>|null,
 *   t38FaxGatewayEnabled?: bool|null,
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
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Optional('country_iso_alpha2')]
    public ?string $countryISOAlpha2;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
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
     * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
     *
     * @var value-of<EmergencyStatus>|null $emergencyStatus
     */
    #[Optional('emergency_status', enum: EmergencyStatus::class)]
    public ?string $emergencyStatus;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Optional('external_pin')]
    public ?string $externalPin;

    /**
     * The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     *
     * @var value-of<InboundCallScreening>|null $inboundCallScreening
     */
    #[Optional('inbound_call_screening', enum: InboundCallScreening::class)]
    public ?string $inboundCallScreening;

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
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    /**
     * ISO 8601 formatted date indicating when the resource was purchased.
     */
    #[Optional('purchased_at')]
    public ?string $purchasedAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Indicates if the phone number was purchased or ported in. For some numbers this information may not be available.
     *
     * @var value-of<SourceType>|null $sourceType
     */
    #[Optional('source_type', enum: SourceType::class, nullable: true)]
    public ?string $sourceType;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergencyStatus
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param SourceType|value-of<SourceType>|null $sourceType
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
        ?string $countryISOAlpha2 = null,
        ?string $createdAt = null,
        ?string $customerReference = null,
        ?bool $deletionLockEnabled = null,
        ?string $emergencyAddressID = null,
        ?bool $emergencyEnabled = null,
        EmergencyStatus|string|null $emergencyStatus = null,
        ?string $externalPin = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?string $messagingProfileID = null,
        ?string $messagingProfileName = null,
        ?string $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $purchasedAt = null,
        ?string $recordType = null,
        SourceType|string|null $sourceType = null,
        Status|string|null $status = null,
        ?bool $t38FaxGatewayEnabled = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $callForwardingEnabled && $obj['callForwardingEnabled'] = $callForwardingEnabled;
        null !== $callRecordingEnabled && $obj['callRecordingEnabled'] = $callRecordingEnabled;
        null !== $callerIDNameEnabled && $obj['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListingEnabled && $obj['cnamListingEnabled'] = $cnamListingEnabled;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $connectionName && $obj['connectionName'] = $connectionName;
        null !== $countryISOAlpha2 && $obj['countryISOAlpha2'] = $countryISOAlpha2;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $deletionLockEnabled && $obj['deletionLockEnabled'] = $deletionLockEnabled;
        null !== $emergencyAddressID && $obj['emergencyAddressID'] = $emergencyAddressID;
        null !== $emergencyEnabled && $obj['emergencyEnabled'] = $emergencyEnabled;
        null !== $emergencyStatus && $obj['emergencyStatus'] = $emergencyStatus;
        null !== $externalPin && $obj['externalPin'] = $externalPin;
        null !== $inboundCallScreening && $obj['inboundCallScreening'] = $inboundCallScreening;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $messagingProfileName && $obj['messagingProfileName'] = $messagingProfileName;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $purchasedAt && $obj['purchasedAt'] = $purchasedAt;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $sourceType && $obj['sourceType'] = $sourceType;
        null !== $status && $obj['status'] = $status;
        null !== $t38FaxGatewayEnabled && $obj['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;
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
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj['callForwardingEnabled'] = $callForwardingEnabled;

        return $obj;
    }

    /**
     * Indicates whether call recording is enabled for this number.
     */
    public function withCallRecordingEnabled(bool $callRecordingEnabled): self
    {
        $obj = clone $this;
        $obj['callRecordingEnabled'] = $callRecordingEnabled;

        return $obj;
    }

    /**
     * Indicates whether caller ID is enabled for this number.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj['callerIDNameEnabled'] = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * Indicates whether a CNAM listing is enabled for this number.
     */
    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $obj = clone $this;
        $obj['cnamListingEnabled'] = $cnamListingEnabled;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connectionName'] = $connectionName;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj['countryISOAlpha2'] = $countryISOAlpha2;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    public function withDeletionLockEnabled(bool $deletionLockEnabled): self
    {
        $obj = clone $this;
        $obj['deletionLockEnabled'] = $deletionLockEnabled;

        return $obj;
    }

    /**
     * Identifies the emergency address associated with the phone number.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergencyAddressID'] = $emergencyAddressID;

        return $obj;
    }

    /**
     * Indicates whether emergency services are enabled for this number.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj['emergencyEnabled'] = $emergencyEnabled;

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
        $obj['emergencyStatus'] = $emergencyStatus;

        return $obj;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj['externalPin'] = $externalPin;

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
        $obj['inboundCallScreening'] = $inboundCallScreening;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * The name of the messaging profile associated with the phone number.
     */
    public function withMessagingProfileName(string $messagingProfileName): self
    {
        $obj = clone $this;
        $obj['messagingProfileName'] = $messagingProfileName;

        return $obj;
    }

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

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
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was purchased.
     */
    public function withPurchasedAt(string $purchasedAt): self
    {
        $obj = clone $this;
        $obj['purchasedAt'] = $purchasedAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
        $obj['sourceType'] = $sourceType;

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
        $obj['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

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
