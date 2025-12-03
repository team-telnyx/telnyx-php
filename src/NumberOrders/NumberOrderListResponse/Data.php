<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderListResponse\Data\PhoneNumber;
use Telnyx\NumberOrders\NumberOrderListResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   billing_group_id?: string|null,
 *   connection_id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   messaging_profile_id?: string|null,
 *   phone_numbers?: list<PhoneNumber>|null,
 *   phone_numbers_count?: int|null,
 *   record_type?: string|null,
 *   requirements_met?: bool|null,
 *   status?: value-of<Status>|null,
 *   sub_number_orders_ids?: list<string>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $billing_group_id;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

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
     * Identifies the messaging profile associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    /** @var list<PhoneNumber>|null $phone_numbers */
    #[Api(list: PhoneNumber::class, optional: true)]
    public ?array $phone_numbers;

    /**
     * The count of phone numbers in the number order.
     */
    #[Api(optional: true)]
    public ?int $phone_numbers_count;

    #[Api(optional: true)]
    public ?string $record_type;

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

    /** @var list<string>|null $sub_number_orders_ids */
    #[Api(list: 'string', optional: true)]
    public ?array $sub_number_orders_ids;

    /**
     * An ISO 8901 datetime string for when the number order was updated.
     */
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
     * @param list<PhoneNumber> $phone_numbers
     * @param Status|value-of<Status> $status
     * @param list<string> $sub_number_orders_ids
     */
    public static function with(
        ?string $id = null,
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_reference = null,
        ?string $messaging_profile_id = null,
        ?array $phone_numbers = null,
        ?int $phone_numbers_count = null,
        ?string $record_type = null,
        ?bool $requirements_met = null,
        Status|string|null $status = null,
        ?array $sub_number_orders_ids = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $messaging_profile_id && $obj->messaging_profile_id = $messaging_profile_id;
        null !== $phone_numbers && $obj->phone_numbers = $phone_numbers;
        null !== $phone_numbers_count && $obj->phone_numbers_count = $phone_numbers_count;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $requirements_met && $obj->requirements_met = $requirements_met;
        null !== $status && $obj['status'] = $status;
        null !== $sub_number_orders_ids && $obj->sub_number_orders_ids = $sub_number_orders_ids;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billing_group_id = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

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
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messaging_profile_id = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<PhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

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
     * @param list<string> $subNumberOrdersIDs
     */
    public function withSubNumberOrdersIDs(array $subNumberOrdersIDs): self
    {
        $obj = clone $this;
        $obj->sub_number_orders_ids = $subNumberOrdersIDs;

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
}
