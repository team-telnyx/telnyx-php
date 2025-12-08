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
 *   bundle_id?: string|null,
 *   country_code?: string|null,
 *   deadline?: \DateTimeInterface|null,
 *   is_block_number?: bool|null,
 *   locality?: string|null,
 *   order_request_id?: string|null,
 *   phone_number?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   record_type?: string|null,
 *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
 *   requirements_met?: bool|null,
 *   requirements_status?: value-of<RequirementsStatus>|null,
 *   status?: value-of<Status>|null,
 *   sub_number_order_id?: string|null,
 * }
 */
final class NumberOrderPhoneNumber implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $bundle_id;

    #[Optional]
    public ?string $country_code;

    #[Optional]
    public ?\DateTimeInterface $deadline;

    #[Optional]
    public ?bool $is_block_number;

    #[Optional]
    public ?string $locality;

    #[Optional]
    public ?string $order_request_id;

    #[Optional]
    public ?string $phone_number;

    /** @var value-of<PhoneNumberType>|null $phone_number_type */
    #[Optional(enum: PhoneNumberType::class)]
    public ?string $phone_number_type;

    #[Optional]
    public ?string $record_type;

    /**
     * @var list<SubNumberOrderRegulatoryRequirementWithValue>|null $regulatory_requirements
     */
    #[Optional(list: SubNumberOrderRegulatoryRequirementWithValue::class)]
    public ?array $regulatory_requirements;

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    #[Optional]
    public ?bool $requirements_met;

    /**
     * Status of requirements (if applicable).
     *
     * @var value-of<RequirementsStatus>|null $requirements_status
     */
    #[Optional(enum: RequirementsStatus::class)]
    public ?string $requirements_status;

    /**
     * The status of the phone number in the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional]
    public ?string $sub_number_order_id;

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
     * @param list<SubNumberOrderRegulatoryRequirementWithValue|array{
     *   field_type?: value-of<FieldType>|null,
     *   field_value?: string|null,
     *   record_type?: string|null,
     *   requirement_id?: string|null,
     * }> $regulatory_requirements
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirements_status
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $bundle_id = null,
        ?string $country_code = null,
        ?\DateTimeInterface $deadline = null,
        ?bool $is_block_number = null,
        ?string $locality = null,
        ?string $order_request_id = null,
        ?string $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $record_type = null,
        ?array $regulatory_requirements = null,
        ?bool $requirements_met = null,
        RequirementsStatus|string|null $requirements_status = null,
        Status|string|null $status = null,
        ?string $sub_number_order_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $bundle_id && $obj['bundle_id'] = $bundle_id;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $deadline && $obj['deadline'] = $deadline;
        null !== $is_block_number && $obj['is_block_number'] = $is_block_number;
        null !== $locality && $obj['locality'] = $locality;
        null !== $order_request_id && $obj['order_request_id'] = $order_request_id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $regulatory_requirements && $obj['regulatory_requirements'] = $regulatory_requirements;
        null !== $requirements_met && $obj['requirements_met'] = $requirements_met;
        null !== $requirements_status && $obj['requirements_status'] = $requirements_status;
        null !== $status && $obj['status'] = $status;
        null !== $sub_number_order_id && $obj['sub_number_order_id'] = $sub_number_order_id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withBundleID(string $bundleID): self
    {
        $obj = clone $this;
        $obj['bundle_id'] = $bundleID;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withDeadline(\DateTimeInterface $deadline): self
    {
        $obj = clone $this;
        $obj['deadline'] = $deadline;

        return $obj;
    }

    public function withIsBlockNumber(bool $isBlockNumber): self
    {
        $obj = clone $this;
        $obj['is_block_number'] = $isBlockNumber;

        return $obj;
    }

    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj['order_request_id'] = $orderRequestID;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirementWithValue|array{
     *   field_type?: value-of<FieldType>|null,
     *   field_value?: string|null,
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

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirements_met'] = $requirementsMet;

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
        $obj['requirements_status'] = $requirementsStatus;

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
        $obj['status'] = $status;

        return $obj;
    }

    public function withSubNumberOrderID(string $subNumberOrderID): self
    {
        $obj = clone $this;
        $obj['sub_number_order_id'] = $subNumberOrderID;

        return $obj;
    }
}
