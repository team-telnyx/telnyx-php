<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse\Data\RecordType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   actionType?: string,
 *   actionURL?: string|null,
 *   cancelReason?: string|null,
 *   createdAt?: \DateTimeInterface,
 *   portingOrderID?: string,
 *   recordType?: value-of<RecordType>,
 *   requirementTypeID?: string,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the action requirement.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The type of action required.
     */
    #[Api('action_type', optional: true)]
    public ?string $actionType;

    /**
     * Optional URL for the action.
     */
    #[Api('action_url', nullable: true, optional: true)]
    public ?string $actionURL;

    /**
     * Reason for cancellation if status is 'cancelled'.
     */
    #[Api('cancel_reason', nullable: true, optional: true)]
    public ?string $cancelReason;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The ID of the porting order this action requirement belongs to.
     */
    #[Api('porting_order_id', optional: true)]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /**
     * The ID of the requirement type.
     */
    #[Api('requirement_type_id', optional: true)]
    public ?string $requirementTypeID;

    /**
     * Current status of the action requirement.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $actionType && $obj->actionType = $actionType;
        null !== $actionURL && $obj->actionURL = $actionURL;
        null !== $cancelReason && $obj->cancelReason = $cancelReason;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $requirementTypeID && $obj->requirementTypeID = $requirementTypeID;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the action requirement.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The type of action required.
     */
    public function withActionType(string $actionType): self
    {
        $obj = clone $this;
        $obj->actionType = $actionType;

        return $obj;
    }

    /**
     * Optional URL for the action.
     */
    public function withActionURL(?string $actionURL): self
    {
        $obj = clone $this;
        $obj->actionURL = $actionURL;

        return $obj;
    }

    /**
     * Reason for cancellation if status is 'cancelled'.
     */
    public function withCancelReason(?string $cancelReason): self
    {
        $obj = clone $this;
        $obj->cancelReason = $cancelReason;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The ID of the porting order this action requirement belongs to.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The ID of the requirement type.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj->requirementTypeID = $requirementTypeID;

        return $obj;
    }

    /**
     * Current status of the action requirement.
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
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
