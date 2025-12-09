<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers\Status;
use Telnyx\NumberOrders\PhoneNumber\PhoneNumberType;
use Telnyx\NumberOrders\PhoneNumber\RequirementsStatus;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;

/**
 * @phpstan-type NumberOrderWithPhoneNumbersShape = array{
 *   id?: string|null,
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumbers?: list<PhoneNumber>|null,
 *   phoneNumbersCount?: int|null,
 *   recordType?: string|null,
 *   requirementsMet?: bool|null,
 *   status?: value-of<Status>|null,
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
     * @param list<PhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   countryISOAlpha2?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   status?: value-of<PhoneNumber\Status>|null,
     * }> $phoneNumbers
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;
        null !== $phoneNumbersCount && $obj['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $requirementsMet && $obj['requirementsMet'] = $requirementsMet;
        null !== $status && $obj['status'] = $status;
        null !== $subNumberOrdersIDs && $obj['subNumberOrdersIDs'] = $subNumberOrdersIDs;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the number order was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<PhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   countryISOAlpha2?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   status?: value-of<PhoneNumber\Status>|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * The count of phone numbers in the number order.
     */
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
     * True if all requirements are met for every phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirementsMet'] = $requirementsMet;

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
        $obj['subNumberOrdersIDs'] = $subNumberOrdersIDs;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the number order was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
