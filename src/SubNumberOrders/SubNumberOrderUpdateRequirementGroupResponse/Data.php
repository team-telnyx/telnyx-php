<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   isBlockSubNumberOrder?: bool|null,
 *   orderRequestID?: string|null,
 *   phoneNumberType?: string|null,
 *   phoneNumbers?: list<PhoneNumber>|null,
 *   phoneNumbersCount?: int|null,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
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
     * @param list<PhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: string|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<PhoneNumber\RegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: string|null,
     *   status?: string|null,
     * }> $phoneNumbers
     * @param list<RegulatoryRequirement|array{
     *   fieldType?: string|null, recordType?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $isBlockSubNumberOrder && $obj['isBlockSubNumberOrder'] = $isBlockSubNumberOrder;
        null !== $orderRequestID && $obj['orderRequestID'] = $orderRequestID;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;
        null !== $phoneNumbersCount && $obj['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $regulatoryRequirements && $obj['regulatoryRequirements'] = $regulatoryRequirements;
        null !== $requirementsMet && $obj['requirementsMet'] = $requirementsMet;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    public function withIsBlockSubNumberOrder(bool $isBlockSubNumberOrder): self
    {
        $obj = clone $this;
        $obj['isBlockSubNumberOrder'] = $isBlockSubNumberOrder;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj['orderRequestID'] = $orderRequestID;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * @param list<PhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: string|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<PhoneNumber\RegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: string|null,
     *   status?: string|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj['phoneNumbersCount'] = $phoneNumbersCount;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   fieldType?: string|null, recordType?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatoryRequirements'] = $regulatoryRequirements;

        return $obj;
    }

    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirementsMet'] = $requirementsMet;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
