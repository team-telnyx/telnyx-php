<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse\Data\RecordType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   actionType?: string|null,
 *   actionURL?: string|null,
 *   cancelReason?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   portingOrderID?: string|null,
 *   recordType?: value-of<RecordType>|null,
 *   requirementTypeID?: string|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the action requirement.
     */
    #[Optional]
    public ?string $id;

    /**
     * The type of action required.
     */
    #[Optional('action_type')]
    public ?string $actionType;

    /**
     * Optional URL for the action.
     */
    #[Optional('action_url', nullable: true)]
    public ?string $actionURL;

    /**
     * Reason for cancellation if status is 'cancelled'.
     */
    #[Optional('cancel_reason', nullable: true)]
    public ?string $cancelReason;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The ID of the porting order this action requirement belongs to.
     */
    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * The ID of the requirement type.
     */
    #[Optional('requirement_type_id')]
    public ?string $requirementTypeID;

    /**
     * Current status of the action requirement.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $actionType = null,
        ?string $actionURL = null,
        ?string $cancelReason = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $portingOrderID = null,
        RecordType|string|null $recordType = null,
        ?string $requirementTypeID = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $actionType && $self['actionType'] = $actionType;
        null !== $actionURL && $self['actionURL'] = $actionURL;
        null !== $cancelReason && $self['cancelReason'] = $cancelReason;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementTypeID && $self['requirementTypeID'] = $requirementTypeID;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the action requirement.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The type of action required.
     */
    public function withActionType(string $actionType): self
    {
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    /**
     * Optional URL for the action.
     */
    public function withActionURL(?string $actionURL): self
    {
        $self = clone $this;
        $self['actionURL'] = $actionURL;

        return $self;
    }

    /**
     * Reason for cancellation if status is 'cancelled'.
     */
    public function withCancelReason(?string $cancelReason): self
    {
        $self = clone $this;
        $self['cancelReason'] = $cancelReason;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The ID of the porting order this action requirement belongs to.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The ID of the requirement type.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $self = clone $this;
        $self['requirementTypeID'] = $requirementTypeID;

        return $self;
    }

    /**
     * Current status of the action requirement.
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
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
