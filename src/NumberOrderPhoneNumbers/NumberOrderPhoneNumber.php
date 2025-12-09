<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\PhoneNumberType;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\RequirementsStatus;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue\FieldType;

/**
 * @phpstan-type NumberOrderPhoneNumberShape = array{
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
    /** @use SdkModel<NumberOrderPhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('bundle_id')]
    public ?string $bundleID;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional]
    public ?\DateTimeInterface $deadline;

    #[Optional('is_block_number')]
    public ?bool $isBlockNumber;

    #[Optional]
    public ?string $locality;

    #[Optional('order_request_id')]
    public ?string $orderRequestID;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /** @var value-of<PhoneNumberType>|null $phoneNumberType */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * @var list<SubNumberOrderRegulatoryRequirementWithValue>|null $regulatoryRequirements
     */
    #[Optional(
        'regulatory_requirements',
        list: SubNumberOrderRegulatoryRequirementWithValue::class,
    )]
    public ?array $regulatoryRequirements;

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    /**
     * Status of requirements (if applicable).
     *
     * @var value-of<RequirementsStatus>|null $requirementsStatus
     */
    #[Optional('requirements_status', enum: RequirementsStatus::class)]
    public ?string $requirementsStatus;

    /**
     * The status of the phone number in the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional('sub_number_order_id')]
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
     * @param list<SubNumberOrderRegulatoryRequirementWithValue|array{
     *   fieldType?: value-of<FieldType>|null,
     *   fieldValue?: string|null,
     *   recordType?: string|null,
     *   requirementID?: string|null,
     * }> $regulatoryRequirements
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $bundleID && $self['bundleID'] = $bundleID;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $deadline && $self['deadline'] = $deadline;
        null !== $isBlockNumber && $self['isBlockNumber'] = $isBlockNumber;
        null !== $locality && $self['locality'] = $locality;
        null !== $orderRequestID && $self['orderRequestID'] = $orderRequestID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $requirementsStatus && $self['requirementsStatus'] = $requirementsStatus;
        null !== $status && $self['status'] = $status;
        null !== $subNumberOrderID && $self['subNumberOrderID'] = $subNumberOrderID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withBundleID(string $bundleID): self
    {
        $self = clone $this;
        $self['bundleID'] = $bundleID;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withDeadline(\DateTimeInterface $deadline): self
    {
        $self = clone $this;
        $self['deadline'] = $deadline;

        return $self;
    }

    public function withIsBlockNumber(bool $isBlockNumber): self
    {
        $self = clone $this;
        $self['isBlockNumber'] = $isBlockNumber;

        return $self;
    }

    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $self = clone $this;
        $self['orderRequestID'] = $orderRequestID;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirementWithValue|array{
     *   fieldType?: value-of<FieldType>|null,
     *   fieldValue?: string|null,
     *   recordType?: string|null,
     *   requirementID?: string|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    /**
     * Status of requirements (if applicable).
     *
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirementsStatus
     */
    public function withRequirementsStatus(
        RequirementsStatus|string $requirementsStatus
    ): self {
        $self = clone $this;
        $self['requirementsStatus'] = $requirementsStatus;

        return $self;
    }

    /**
     * The status of the phone number in the order.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubNumberOrderID(string $subNumberOrderID): self
    {
        $self = clone $this;
        $self['subNumberOrderID'] = $subNumberOrderID;

        return $self;
    }
}
