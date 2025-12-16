<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Status;

/**
 * @phpstan-type PhoneNumberSlimListResponseShape = array{
 *   id?: string|null,
 *   billingGroupID?: string|null,
 *   callForwardingEnabled?: bool|null,
 *   callRecordingEnabled?: bool|null,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListingEnabled?: bool|null,
 *   connectionID?: string|null,
 *   countryISOAlpha2?: string|null,
 *   createdAt?: string|null,
 *   customerReference?: string|null,
 *   emergencyAddressID?: string|null,
 *   emergencyEnabled?: bool|null,
 *   emergencyStatus?: null|EmergencyStatus|value-of<EmergencyStatus>,
 *   externalPin?: string|null,
 *   inboundCallScreening?: null|InboundCallScreening|value-of<InboundCallScreening>,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   purchasedAt?: string|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   t38FaxGatewayEnabled?: bool|null,
 * }
 */
final class PhoneNumberSlimListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberSlimListResponseShape> */
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $billingGroupID = null,
        ?bool $callForwardingEnabled = null,
        ?bool $callRecordingEnabled = null,
        ?bool $callerIDNameEnabled = null,
        ?bool $cnamListingEnabled = null,
        ?string $connectionID = null,
        ?string $countryISOAlpha2 = null,
        ?string $createdAt = null,
        ?string $customerReference = null,
        ?string $emergencyAddressID = null,
        ?bool $emergencyEnabled = null,
        EmergencyStatus|string|null $emergencyStatus = null,
        ?string $externalPin = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?string $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $purchasedAt = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?bool $t38FaxGatewayEnabled = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $callForwardingEnabled && $self['callForwardingEnabled'] = $callForwardingEnabled;
        null !== $callRecordingEnabled && $self['callRecordingEnabled'] = $callRecordingEnabled;
        null !== $callerIDNameEnabled && $self['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListingEnabled && $self['cnamListingEnabled'] = $cnamListingEnabled;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $countryISOAlpha2 && $self['countryISOAlpha2'] = $countryISOAlpha2;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        null !== $emergencyEnabled && $self['emergencyEnabled'] = $emergencyEnabled;
        null !== $emergencyStatus && $self['emergencyStatus'] = $emergencyStatus;
        null !== $externalPin && $self['externalPin'] = $externalPin;
        null !== $inboundCallScreening && $self['inboundCallScreening'] = $inboundCallScreening;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $purchasedAt && $self['purchasedAt'] = $purchasedAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $t38FaxGatewayEnabled && $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

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
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $self = clone $this;
        $self['externalPin'] = $externalPin;

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
     * Indicates whether T38 Fax Gateway for inbound calls to this number.
     */
    public function withT38FaxGatewayEnabled(bool $t38FaxGatewayEnabled): self
    {
        $self = clone $this;
        $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

        return $self;
    }
}
