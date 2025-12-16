<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-import-type PhoneNumberShape from \Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\RegulatoryRequirement
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   isBlockSubNumberOrder?: bool|null,
 *   orderRequestID?: string|null,
 *   phoneNumberType?: string|null,
 *   phoneNumbers?: list<PhoneNumberShape>|null,
 *   phoneNumbersCount?: int|null,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirementShape>|null,
 *   requirementsMet?: bool|null,
 *   status?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    #[Optional('is_block_sub_number_order')]
    public ?bool $isBlockSubNumberOrder;

    #[Optional('order_request_id')]
    public ?string $orderRequestID;

    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    /** @var list<PhoneNumber>|null $phoneNumbers */
    #[Optional('phone_numbers', list: PhoneNumber::class)]
    public ?array $phoneNumbers;

    #[Optional('phone_numbers_count')]
    public ?int $phoneNumbersCount;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Optional('regulatory_requirements', list: RegulatoryRequirement::class)]
    public ?array $regulatoryRequirements;

    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    #[Optional]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumberShape> $phoneNumbers
     * @param list<RegulatoryRequirementShape> $regulatoryRequirements
     */
    public static function with(
        ?string $id = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?bool $isBlockSubNumberOrder = null,
        ?string $orderRequestID = null,
        ?string $phoneNumberType = null,
        ?array $phoneNumbers = null,
        ?int $phoneNumbersCount = null,
        ?string $recordType = null,
        ?array $regulatoryRequirements = null,
        ?bool $requirementsMet = null,
        ?string $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $isBlockSubNumberOrder && $self['isBlockSubNumberOrder'] = $isBlockSubNumberOrder;
        null !== $orderRequestID && $self['orderRequestID'] = $orderRequestID;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        null !== $phoneNumbersCount && $self['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    public function withIsBlockSubNumberOrder(bool $isBlockSubNumberOrder): self
    {
        $self = clone $this;
        $self['isBlockSubNumberOrder'] = $isBlockSubNumberOrder;

        return $self;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $self = clone $this;
        $self['orderRequestID'] = $orderRequestID;

        return $self;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * @param list<PhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $self = clone $this;
        $self['phoneNumbersCount'] = $phoneNumbersCount;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<RegulatoryRequirementShape> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
