<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\SourceType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\Status;

/**
 * @phpstan-type PhoneNumberDetailedShape = array{
 *   id: string,
 *   countryISOAlpha2: string,
 *   createdAt: \DateTimeInterface,
 *   deletionLockEnabled: bool,
 *   externalPin: string|null,
 *   phoneNumber: string,
 *   phoneNumberType: PhoneNumberType|value-of<PhoneNumberType>,
 *   purchasedAt: string,
 *   recordType: string,
 *   status: Status|value-of<Status>,
 *   tags: list<string>,
 *   billingGroupID?: string|null,
 *   callForwardingEnabled?: bool|null,
 *   callRecordingEnabled?: bool|null,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListingEnabled?: bool|null,
 *   connectionID?: string|null,
 *   connectionName?: string|null,
 *   customerReference?: string|null,
 *   emergencyAddressID?: string|null,
 *   emergencyEnabled?: bool|null,
 *   emergencyStatus?: null|EmergencyStatus|value-of<EmergencyStatus>,
 *   hdVoiceEnabled?: bool|null,
 *   inboundCallScreening?: null|InboundCallScreening|value-of<InboundCallScreening>,
 *   messagingProfileID?: string|null,
 *   messagingProfileName?: string|null,
 *   sourceType?: null|SourceType|value-of<SourceType>,
 *   t38FaxGatewayEnabled?: bool|null,
 *   updatedAt?: string|null,
 * }
 */
final class PhoneNumberDetailed implements BaseModel
{
    /** @use SdkModel<PhoneNumberDetailedShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Required]
    public string $id;

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Required('country_iso_alpha2')]
    public string $countryISOAlpha2;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Indicates whether deletion lock is enabled for this number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    #[Required('deletion_lock_enabled')]
    public bool $deletionLockEnabled;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Required('external_pin')]
    public ?string $externalPin;

    /**
     * The +E.164-formatted phone number associated with this record.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * The phone number's type.
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
     *
     * @var value-of<PhoneNumberType> $phoneNumberType
     */
    #[Required('phone_number_type', enum: PhoneNumberType::class)]
    public string $phoneNumberType;

    /**
     * ISO 8601 formatted date indicating when the resource was purchased.
     */
    #[Required('purchased_at')]
    public string $purchasedAt;

    /**
     * Identifies the type of the resource.
     */
    #[Required('record_type')]
    public string $recordType;

    /**
     * The phone number's current status.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * A list of user-assigned tags to help manage the phone number.
     *
     * @var list<string> $tags
     */
    #[Required(list: 'string')]
    public array $tags;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Optional('billing_group_id', nullable: true)]
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
    #[Optional('connection_id', nullable: true)]
    public ?string $connectionID;

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    #[Optional('connection_name', nullable: true)]
    public ?string $connectionName;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference', nullable: true)]
    public ?string $customerReference;

    /**
     * Identifies the emergency address associated with the phone number.
     */
    #[Optional('emergency_address_id', nullable: true)]
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
     * Indicates whether HD voice is enabled for this number.
     */
    #[Optional('hd_voice_enabled')]
    public ?bool $hdVoiceEnabled;

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
    #[Optional('messaging_profile_id', nullable: true)]
    public ?string $messagingProfileID;

    /**
     * The name of the messaging profile associated with the phone number.
     */
    #[Optional('messaging_profile_name', nullable: true)]
    public ?string $messagingProfileName;

    /**
     * Indicates if the phone number was purchased or ported in. For some numbers this information may not be available.
     *
     * @var value-of<SourceType>|null $sourceType
     */
    #[Optional('source_type', enum: SourceType::class, nullable: true)]
    public ?string $sourceType;

    /**
     * Indicates whether T38 Fax Gateway for inbound calls to this number.
     */
    #[Optional('t38_fax_gateway_enabled')]
    public ?bool $t38FaxGatewayEnabled;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * `new PhoneNumberDetailed()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberDetailed::with(
     *   id: ...,
     *   countryISOAlpha2: ...,
     *   createdAt: ...,
     *   deletionLockEnabled: ...,
     *   externalPin: ...,
     *   phoneNumber: ...,
     *   phoneNumberType: ...,
     *   purchasedAt: ...,
     *   recordType: ...,
     *   status: ...,
     *   tags: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberDetailed)
     *   ->withID(...)
     *   ->withCountryISOAlpha2(...)
     *   ->withCreatedAt(...)
     *   ->withDeletionLockEnabled(...)
     *   ->withExternalPin(...)
     *   ->withPhoneNumber(...)
     *   ->withPhoneNumberType(...)
     *   ->withPurchasedAt(...)
     *   ->withRecordType(...)
     *   ->withStatus(...)
     *   ->withTags(...)
     * ```
     */
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
     * @param EmergencyStatus|value-of<EmergencyStatus>|null $emergencyStatus
     * @param InboundCallScreening|value-of<InboundCallScreening>|null $inboundCallScreening
     * @param SourceType|value-of<SourceType>|null $sourceType
     */
    public static function with(
        string $id,
        string $countryISOAlpha2,
        \DateTimeInterface $createdAt,
        bool $deletionLockEnabled,
        ?string $externalPin,
        string $phoneNumber,
        PhoneNumberType|string $phoneNumberType,
        string $purchasedAt,
        string $recordType,
        Status|string $status,
        array $tags,
        ?string $billingGroupID = null,
        ?bool $callForwardingEnabled = null,
        ?bool $callRecordingEnabled = null,
        ?bool $callerIDNameEnabled = null,
        ?bool $cnamListingEnabled = null,
        ?string $connectionID = null,
        ?string $connectionName = null,
        ?string $customerReference = null,
        ?string $emergencyAddressID = null,
        ?bool $emergencyEnabled = null,
        EmergencyStatus|string|null $emergencyStatus = null,
        ?bool $hdVoiceEnabled = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?string $messagingProfileID = null,
        ?string $messagingProfileName = null,
        SourceType|string|null $sourceType = null,
        ?bool $t38FaxGatewayEnabled = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['countryISOAlpha2'] = $countryISOAlpha2;
        $self['createdAt'] = $createdAt;
        $self['deletionLockEnabled'] = $deletionLockEnabled;
        $self['externalPin'] = $externalPin;
        $self['phoneNumber'] = $phoneNumber;
        $self['phoneNumberType'] = $phoneNumberType;
        $self['purchasedAt'] = $purchasedAt;
        $self['recordType'] = $recordType;
        $self['status'] = $status;
        $self['tags'] = $tags;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $callForwardingEnabled && $self['callForwardingEnabled'] = $callForwardingEnabled;
        null !== $callRecordingEnabled && $self['callRecordingEnabled'] = $callRecordingEnabled;
        null !== $callerIDNameEnabled && $self['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListingEnabled && $self['cnamListingEnabled'] = $cnamListingEnabled;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        null !== $emergencyEnabled && $self['emergencyEnabled'] = $emergencyEnabled;
        null !== $emergencyStatus && $self['emergencyStatus'] = $emergencyStatus;
        null !== $hdVoiceEnabled && $self['hdVoiceEnabled'] = $hdVoiceEnabled;
        null !== $inboundCallScreening && $self['inboundCallScreening'] = $inboundCallScreening;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $messagingProfileName && $self['messagingProfileName'] = $messagingProfileName;
        null !== $sourceType && $self['sourceType'] = $sourceType;
        null !== $t38FaxGatewayEnabled && $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;
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
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $self = clone $this;
        $self['countryISOAlpha2'] = $countryISOAlpha2;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(?string $externalPin): self
    {
        $self = clone $this;
        $self['externalPin'] = $externalPin;

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
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
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
     * ISO 8601 formatted date indicating when the resource was purchased.
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
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(?string $billingGroupID): self
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
    public function withConnectionID(?string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The user-assigned name of the connection to be associated with this phone number.
     */
    public function withConnectionName(?string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Identifies the emergency address associated with the phone number.
     */
    public function withEmergencyAddressID(?string $emergencyAddressID): self
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
     * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergencyStatus
     */
    public function withEmergencyStatus(
        EmergencyStatus|string $emergencyStatus
    ): self {
        $self = clone $this;
        $self['emergencyStatus'] = $emergencyStatus;

        return $self;
    }

    /**
     * Indicates whether HD voice is enabled for this number.
     */
    public function withHDVoiceEnabled(bool $hdVoiceEnabled): self
    {
        $self = clone $this;
        $self['hdVoiceEnabled'] = $hdVoiceEnabled;

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
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The name of the messaging profile associated with the phone number.
     */
    public function withMessagingProfileName(
        ?string $messagingProfileName
    ): self {
        $self = clone $this;
        $self['messagingProfileName'] = $messagingProfileName;

        return $self;
    }

    /**
     * Indicates if the phone number was purchased or ported in. For some numbers this information may not be available.
     *
     * @param SourceType|value-of<SourceType>|null $sourceType
     */
    public function withSourceType(SourceType|string|null $sourceType): self
    {
        $self = clone $this;
        $self['sourceType'] = $sourceType;

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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
