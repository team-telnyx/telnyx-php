<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   is_block_sub_number_order?: bool|null,
 *   order_request_id?: string|null,
 *   phone_number_type?: string|null,
 *   phone_numbers?: list<PhoneNumber>|null,
 *   phone_numbers_count?: int|null,
 *   record_type?: string|null,
 *   regulatory_requirements?: list<RegulatoryRequirement>|null,
 *   requirements_met?: bool|null,
 *   status?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $country_code;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?string $customer_reference;

    #[Api(optional: true)]
    public ?bool $is_block_sub_number_order;

    #[Api(optional: true)]
    public ?string $order_request_id;

    #[Api(optional: true)]
    public ?string $phone_number_type;

    /** @var list<PhoneNumber>|null $phone_numbers */
    #[Api(list: PhoneNumber::class, optional: true)]
    public ?array $phone_numbers;

    #[Api(optional: true)]
    public ?int $phone_numbers_count;

    #[Api(optional: true)]
    public ?string $record_type;

    /** @var list<RegulatoryRequirement>|null $regulatory_requirements */
    #[Api(list: RegulatoryRequirement::class, optional: true)]
    public ?array $regulatory_requirements;

    #[Api(optional: true)]
    public ?bool $requirements_met;

    #[Api(optional: true)]
    public ?string $status;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

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
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: string|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<PhoneNumber\RegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: string|null,
     *   status?: string|null,
     * }> $phone_numbers
     * @param list<RegulatoryRequirement|array{
     *   field_type?: string|null,
     *   record_type?: string|null,
     *   requirement_id?: string|null,
     * }> $regulatory_requirements
     */
    public static function with(
        ?string $id = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_reference = null,
        ?bool $is_block_sub_number_order = null,
        ?string $order_request_id = null,
        ?string $phone_number_type = null,
        ?array $phone_numbers = null,
        ?int $phone_numbers_count = null,
        ?string $record_type = null,
        ?array $regulatory_requirements = null,
        ?bool $requirements_met = null,
        ?string $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $is_block_sub_number_order && $obj['is_block_sub_number_order'] = $is_block_sub_number_order;
        null !== $order_request_id && $obj['order_request_id'] = $order_request_id;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $phone_numbers && $obj['phone_numbers'] = $phone_numbers;
        null !== $phone_numbers_count && $obj['phone_numbers_count'] = $phone_numbers_count;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $regulatory_requirements && $obj['regulatory_requirements'] = $regulatory_requirements;
        null !== $requirements_met && $obj['requirements_met'] = $requirements_met;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    public function withIsBlockSubNumberOrder(bool $isBlockSubNumberOrder): self
    {
        $obj = clone $this;
        $obj['is_block_sub_number_order'] = $isBlockSubNumberOrder;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj['order_request_id'] = $orderRequestID;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * @param list<PhoneNumber|array{
     *   id?: string|null,
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: string|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<PhoneNumber\RegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: string|null,
     *   status?: string|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }

    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj['phone_numbers_count'] = $phoneNumbersCount;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   field_type?: string|null,
     *   record_type?: string|null,
     *   requirement_id?: string|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatory_requirements'] = $regulatoryRequirements;

        return $obj;
    }

    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirements_met'] = $requirementsMet;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
