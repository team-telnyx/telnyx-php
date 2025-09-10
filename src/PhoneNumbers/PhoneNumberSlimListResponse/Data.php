<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\Status;

/**
 * @phpstan-type data_alias = array{
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
 *   emergencyStatus?: value-of<EmergencyStatus>|null,
 *   externalPin?: string|null,
 *   inboundCallScreening?: value-of<InboundCallScreening>|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   purchasedAt?: string|null,
 *   recordType?: string|null,
 *   status?: value-of<Status>|null,
 *   t38FaxGatewayEnabled?: bool|null,
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
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Api('country_iso_alpha2', optional: true)]
    public ?string $countryISOAlpha2;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

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
     * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
     *
     * @var value-of<EmergencyStatus>|null $emergencyStatus
     */
    #[Api('emergency_status', enum: EmergencyStatus::class, optional: true)]
    public ?string $emergencyStatus;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, Telnyx will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Api('external_pin', optional: true)]
    public ?string $externalPin;

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
     * The +E.164-formatted phone number associated with this record.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * The phone number's type.
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * ISO 8601 formatted date indicating when the resource was purchased.
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $callForwardingEnabled && $obj->callForwardingEnabled = $callForwardingEnabled;
        null !== $callRecordingEnabled && $obj->callRecordingEnabled = $callRecordingEnabled;
        null !== $callerIDNameEnabled && $obj->callerIDNameEnabled = $callerIDNameEnabled;
        null !== $cnamListingEnabled && $obj->cnamListingEnabled = $cnamListingEnabled;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $countryISOAlpha2 && $obj->countryISOAlpha2 = $countryISOAlpha2;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $emergencyAddressID && $obj->emergencyAddressID = $emergencyAddressID;
        null !== $emergencyEnabled && $obj->emergencyEnabled = $emergencyEnabled;
        null !== $emergencyStatus && $obj->emergencyStatus = $emergencyStatus instanceof EmergencyStatus ? $emergencyStatus->value : $emergencyStatus;
        null !== $externalPin && $obj->externalPin = $externalPin;
        null !== $inboundCallScreening && $obj->inboundCallScreening = $inboundCallScreening instanceof InboundCallScreening ? $inboundCallScreening->value : $inboundCallScreening;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $purchasedAt && $obj->purchasedAt = $purchasedAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $t38FaxGatewayEnabled && $obj->t38FaxGatewayEnabled = $t38FaxGatewayEnabled;

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
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj->countryISOAlpha2 = $countryISOAlpha2;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
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
     * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergencyStatus
     */
    public function withEmergencyStatus(
        EmergencyStatus|string $emergencyStatus
    ): self {
        $obj = clone $this;
        $obj->emergencyStatus = $emergencyStatus instanceof EmergencyStatus ? $emergencyStatus->value : $emergencyStatus;

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
     * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
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
     * ISO 8601 formatted date indicating when the resource was purchased.
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
}
