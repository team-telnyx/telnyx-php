<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrder\PhoneNumberType;
use Telnyx\SubNumberOrders\SubNumberOrder\Status;

/**
 * @phpstan-type sub_number_order = array{
 *   id?: string,
 *   countryCode?: string,
 *   createdAt?: \DateTimeInterface,
 *   customerReference?: string,
 *   isBlockSubNumberOrder?: bool,
 *   orderRequestID?: string,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   phoneNumbersCount?: int,
 *   recordType?: string,
 *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirement>,
 *   requirementsMet?: bool,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 *   userID?: string,
 * }
 */
final class SubNumberOrder implements BaseModel
{
    /** @use SdkModel<sub_number_order> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * An ISO 8901 datetime string denoting when the number order was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * True if the sub number order is a block sub number order.
     */
    #[Api('is_block_sub_number_order', optional: true)]
    public ?bool $isBlockSubNumberOrder;

    #[Api('order_request_id', optional: true)]
    public ?string $orderRequestID;

    /** @var value-of<PhoneNumberType>|null $phoneNumberType */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * The count of phone numbers in the number order.
     */
    #[Api('phone_numbers_count', optional: true)]
    public ?int $phoneNumbersCount;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * @var list<SubNumberOrderRegulatoryRequirement>|null $regulatoryRequirements
     */
    #[Api(
        'regulatory_requirements',
        list: SubNumberOrderRegulatoryRequirement::class,
        optional: true,
    )]
    public ?array $regulatoryRequirements;

    /**
     * True if all requirements are met for every phone number, false otherwise.
     */
    #[Api('requirements_met', optional: true)]
    public ?bool $requirementsMet;

    /**
     * The status of the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * An ISO 8901 datetime string for when the number order was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api('user_id', optional: true)]
    public ?string $userID;

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
     * @param list<SubNumberOrderRegulatoryRequirement> $regulatoryRequirements
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?bool $isBlockSubNumberOrder = null,
        ?string $orderRequestID = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?int $phoneNumbersCount = null,
        ?string $recordType = null,
        ?array $regulatoryRequirements = null,
        ?bool $requirementsMet = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $isBlockSubNumberOrder && $obj->isBlockSubNumberOrder = $isBlockSubNumberOrder;
        null !== $orderRequestID && $obj->orderRequestID = $orderRequestID;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $phoneNumbersCount && $obj->phoneNumbersCount = $phoneNumbersCount;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;
        null !== $requirementsMet && $obj->requirementsMet = $requirementsMet;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the number order was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
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
     * True if the sub number order is a block sub number order.
     */
    public function withIsBlockSubNumberOrder(bool $isBlockSubNumberOrder): self
    {
        $obj = clone $this;
        $obj->isBlockSubNumberOrder = $isBlockSubNumberOrder;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj->orderRequestID = $orderRequestID;

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

    /**
     * The count of phone numbers in the number order.
     */
    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj->phoneNumbersCount = $phoneNumbersCount;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }

    /**
     * True if all requirements are met for every phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj->requirementsMet = $requirementsMet;

        return $obj;
    }

    /**
     * The status of the order.
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
     * An ISO 8901 datetime string for when the number order was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
