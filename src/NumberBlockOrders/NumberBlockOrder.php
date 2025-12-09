<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrder\Status;

/**
 * @phpstan-type NumberBlockOrderShape = array{
 *   id?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumbersCount?: int|null,
 *   range?: int|null,
 *   recordType?: string|null,
 *   requirementsMet?: bool|null,
 *   startingNumber?: string|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NumberBlockOrder implements BaseModel
{
    /** @use SdkModel<NumberBlockOrderShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Identifies the connection associated to all numbers in the phone number block.
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
     * Identifies the messaging profile associated to all numbers in the phone number block.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * The count of phone numbers in the number order.
     */
    #[Optional('phone_numbers_count')]
    public ?int $phoneNumbersCount;

    /**
     * The phone number range included in the block.
     */
    #[Optional]
    public ?int $range;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * True if all requirements are met for every phone number, false otherwise.
     */
    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    /**
     * Starting phone number block.
     */
    #[Optional('starting_number')]
    public ?string $startingNumber;

    /**
     * The status of the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $connectionID = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?int $phoneNumbersCount = null,
        ?int $range = null,
        ?string $recordType = null,
        ?bool $requirementsMet = null,
        ?string $startingNumber = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbersCount && $obj['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $range && $obj['range'] = $range;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $requirementsMet && $obj['requirementsMet'] = $requirementsMet;
        null !== $startingNumber && $obj['startingNumber'] = $startingNumber;
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

    /**
     * Identifies the connection associated to all numbers in the phone number block.
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
     * Identifies the messaging profile associated to all numbers in the phone number block.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

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

    /**
     * The phone number range included in the block.
     */
    public function withRange(int $range): self
    {
        $obj = clone $this;
        $obj['range'] = $range;

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
     * Starting phone number block.
     */
    public function withStartingNumber(string $startingNumber): self
    {
        $obj = clone $this;
        $obj['startingNumber'] = $startingNumber;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
