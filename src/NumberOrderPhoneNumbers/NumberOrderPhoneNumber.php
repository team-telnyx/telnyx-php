<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\PhoneNumberType;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\RequirementsStatus;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;

/**
 * @phpstan-type number_order_phone_number = array{
 *   id?: string|null,
 *   bundleID?: string|null,
 *   countryCode?: string|null,
 *   deadline?: \DateTimeInterface|null,
 *   isBlockNumber?: bool|null,
 *   locality?: string|null,
 *   orderRequestID?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
 *   requirementsMet?: bool|null,
 *   requirementsStatus?: value-of<RequirementsStatus>|null,
 *   status?: value-of<Status>|null,
 *   subNumberOrderID?: string|null,
 * }
 */
final class NumberOrderPhoneNumber implements BaseModel
{
    /** @use SdkModel<number_order_phone_number> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api('bundle_id', optional: true)]
    public ?string $bundleID;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    #[Api(optional: true)]
    public ?\DateTimeInterface $deadline;

    #[Api('is_block_number', optional: true)]
    public ?bool $isBlockNumber;

    #[Api(optional: true)]
    public ?string $locality;

    #[Api('order_request_id', optional: true)]
    public ?string $orderRequestID;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /** @var value-of<PhoneNumberType>|null $phoneNumberType */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * @var list<SubNumberOrderRegulatoryRequirementWithValue>|null $regulatoryRequirements
     */
    #[Api(
        'regulatory_requirements',
        list: SubNumberOrderRegulatoryRequirementWithValue::class,
        optional: true,
    )]
    public ?array $regulatoryRequirements;

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    #[Api('requirements_met', optional: true)]
    public ?bool $requirementsMet;

    /**
     * Status of requirements (if applicable).
     *
     * @var value-of<RequirementsStatus>|null $requirementsStatus
     */
    #[Api('requirements_status', enum: RequirementsStatus::class, optional: true)]
    public ?string $requirementsStatus;

    /**
     * The status of the phone number in the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api('sub_number_order_id', optional: true)]
    public ?string $subNumberOrderID;

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
     * @param list<SubNumberOrderRegulatoryRequirementWithValue> $regulatoryRequirements
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirementsStatus
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $bundleID = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $deadline = null,
        ?bool $isBlockNumber = null,
        ?string $locality = null,
        ?string $orderRequestID = null,
        ?string $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $recordType = null,
        ?array $regulatoryRequirements = null,
        ?bool $requirementsMet = null,
        RequirementsStatus|string|null $requirementsStatus = null,
        Status|string|null $status = null,
        ?string $subNumberOrderID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $bundleID && $obj->bundleID = $bundleID;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $deadline && $obj->deadline = $deadline;
        null !== $isBlockNumber && $obj->isBlockNumber = $isBlockNumber;
        null !== $locality && $obj->locality = $locality;
        null !== $orderRequestID && $obj->orderRequestID = $orderRequestID;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;
        null !== $requirementsMet && $obj->requirementsMet = $requirementsMet;
        null !== $requirementsStatus && $obj->requirementsStatus = $requirementsStatus instanceof RequirementsStatus ? $requirementsStatus->value : $requirementsStatus;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $subNumberOrderID && $obj->subNumberOrderID = $subNumberOrderID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withBundleID(string $bundleID): self
    {
        $obj = clone $this;
        $obj->bundleID = $bundleID;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withDeadline(\DateTimeInterface $deadline): self
    {
        $obj = clone $this;
        $obj->deadline = $deadline;

        return $obj;
    }

    public function withIsBlockNumber(bool $isBlockNumber): self
    {
        $obj = clone $this;
        $obj->isBlockNumber = $isBlockNumber;

        return $obj;
    }

    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj->orderRequestID = $orderRequestID;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirementWithValue> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj->requirementsMet = $requirementsMet;

        return $obj;
    }

    /**
     * Status of requirements (if applicable).
     *
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirementsStatus
     */
    public function withRequirementsStatus(
        RequirementsStatus|string $requirementsStatus
    ): self {
        $obj = clone $this;
        $obj->requirementsStatus = $requirementsStatus instanceof RequirementsStatus ? $requirementsStatus->value : $requirementsStatus;

        return $obj;
    }

    /**
     * The status of the phone number in the order.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    public function withSubNumberOrderID(string $subNumberOrderID): self
    {
        $obj = clone $this;
        $obj->subNumberOrderID = $subNumberOrderID;

        return $obj;
    }
}
