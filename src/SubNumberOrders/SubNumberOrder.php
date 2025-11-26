<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrder\PhoneNumberType;
use Telnyx\SubNumberOrders\SubNumberOrder\Status;

/**
 * @phpstan-type SubNumberOrderShape = array{
 *   id?: string|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   is_block_sub_number_order?: bool|null,
 *   order_request_id?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   phone_numbers_count?: int|null,
 *   record_type?: string|null,
 *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirement>|null,
 *   requirements_met?: bool|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 *   user_id?: string|null,
 * }
 */
final class SubNumberOrder implements BaseModel
{
    /** @use SdkModel<SubNumberOrderShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * An ISO 8901 datetime string denoting when the number order was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * True if the sub number order is a block sub number order.
     */
    #[Api(optional: true)]
    public ?bool $is_block_sub_number_order;

    #[Api(optional: true)]
    public ?string $order_request_id;

    /** @var value-of<PhoneNumberType>|null $phone_number_type */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * The count of phone numbers in the number order.
     */
    #[Api(optional: true)]
    public ?int $phone_numbers_count;

    #[Api(optional: true)]
    public ?string $record_type;

    /** @var list<SubNumberOrderRegulatoryRequirement>|null $regulatory_requirements */
    #[Api(list: SubNumberOrderRegulatoryRequirement::class, optional: true)]
    public ?array $regulatory_requirements;

    /**
     * True if all requirements are met for every phone number, false otherwise.
     */
    #[Api(optional: true)]
    public ?bool $requirements_met;

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
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    #[Api(optional: true)]
    public ?string $user_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param list<SubNumberOrderRegulatoryRequirement> $regulatory_requirements
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_reference = null,
        ?bool $is_block_sub_number_order = null,
        ?string $order_request_id = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?int $phone_numbers_count = null,
        ?string $record_type = null,
        ?array $regulatory_requirements = null,
        ?bool $requirements_met = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $is_block_sub_number_order && $obj->is_block_sub_number_order = $is_block_sub_number_order;
        null !== $order_request_id && $obj->order_request_id = $order_request_id;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $phone_numbers_count && $obj->phone_numbers_count = $phone_numbers_count;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $regulatory_requirements && $obj->regulatory_requirements = $regulatory_requirements;
        null !== $requirements_met && $obj->requirements_met = $requirements_met;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $user_id && $obj->user_id = $user_id;

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
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the number order was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * True if the sub number order is a block sub number order.
     */
    public function withIsBlockSubNumberOrder(bool $isBlockSubNumberOrder): self
    {
        $obj = clone $this;
        $obj->is_block_sub_number_order = $isBlockSubNumberOrder;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj->order_request_id = $orderRequestID;

        return $obj;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * The count of phone numbers in the number order.
     */
    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj->phone_numbers_count = $phoneNumbersCount;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatory_requirements = $regulatoryRequirements;

        return $obj;
    }

    /**
     * True if all requirements are met for every phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj->requirements_met = $requirementsMet;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the number order was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }
}
