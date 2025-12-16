<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers\Status;

/**
 * @phpstan-import-type PhoneNumberShape from \Telnyx\NumberOrders\PhoneNumber
 *
 * @phpstan-type NumberOrderWithPhoneNumbersShape = array{
 *   id?: string|null,
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumbers?: list<PhoneNumberShape>|null,
 *   phoneNumbersCount?: int|null,
 *   recordType?: string|null,
 *   requirementsMet?: bool|null,
 *   status?: null|Status|value-of<Status>,
 *   subNumberOrdersIDs?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NumberOrderWithPhoneNumbers implements BaseModel
{
    /** @use SdkModel<NumberOrderWithPhoneNumbersShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * An ISO 8901 datetime string denoting when the number order was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /** @var list<PhoneNumber>|null $phoneNumbers */
    #[Optional('phone_numbers', list: PhoneNumber::class)]
    public ?array $phoneNumbers;

    /**
     * The count of phone numbers in the number order.
     */
    #[Optional('phone_numbers_count')]
    public ?int $phoneNumbersCount;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * True if all requirements are met for every phone number, false otherwise.
     */
    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    /**
     * The status of the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var list<string>|null $subNumberOrdersIDs */
    #[Optional('sub_number_orders_ids', list: 'string')]
    public ?array $subNumberOrdersIDs;

    /**
     * An ISO 8901 datetime string for when the number order was updated.
     */
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
     * @param Status|value-of<Status> $status
     * @param list<string> $subNumberOrdersIDs
     */
    public static function with(
        ?string $id = null,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        ?int $phoneNumbersCount = null,
        ?string $recordType = null,
        ?bool $requirementsMet = null,
        Status|string|null $status = null,
        ?array $subNumberOrdersIDs = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        null !== $phoneNumbersCount && $self['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $status && $self['status'] = $status;
        null !== $subNumberOrdersIDs && $self['subNumberOrdersIDs'] = $subNumberOrdersIDs;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * An ISO 8901 datetime string denoting when the number order was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

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

    /**
     * The count of phone numbers in the number order.
     */
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
     * True if all requirements are met for every phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    /**
     * The status of the order.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<string> $subNumberOrdersIDs
     */
    public function withSubNumberOrdersIDs(array $subNumberOrdersIDs): self
    {
        $self = clone $this;
        $self['subNumberOrdersIDs'] = $subNumberOrdersIDs;

        return $self;
    }

    /**
     * An ISO 8901 datetime string for when the number order was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
