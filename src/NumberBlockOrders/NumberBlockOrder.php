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
 *   status?: null|Status|value-of<Status>,
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
     * @param Status|value-of<Status>|null $status
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbersCount && $self['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $range && $self['range'] = $range;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $startingNumber && $self['startingNumber'] = $startingNumber;
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

    /**
     * Identifies the connection associated to all numbers in the phone number block.
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
     * Identifies the messaging profile associated to all numbers in the phone number block.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

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

    /**
     * The phone number range included in the block.
     */
    public function withRange(int $range): self
    {
        $self = clone $this;
        $self['range'] = $range;

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
     * Starting phone number block.
     */
    public function withStartingNumber(string $startingNumber): self
    {
        $self = clone $this;
        $self['startingNumber'] = $startingNumber;

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
     * An ISO 8901 datetime string for when the number order was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
