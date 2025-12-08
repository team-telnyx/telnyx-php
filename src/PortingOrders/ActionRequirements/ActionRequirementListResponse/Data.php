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
 *   action_type?: string|null,
 *   action_url?: string|null,
 *   cancel_reason?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   porting_order_id?: string|null,
 *   record_type?: value-of<RecordType>|null,
 *   requirement_type_id?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
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
    #[Optional]
    public ?string $action_type;

    /**
     * Optional URL for the action.
     */
    #[Optional(nullable: true)]
    public ?string $action_url;

    /**
     * Reason for cancellation if status is 'cancelled'.
     */
    #[Optional(nullable: true)]
    public ?string $cancel_reason;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * The ID of the porting order this action requirement belongs to.
     */
    #[Optional]
    public ?string $porting_order_id;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

    /**
     * The ID of the requirement type.
     */
    #[Optional]
    public ?string $requirement_type_id;

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
    #[Optional]
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
     * @param RecordType|value-of<RecordType> $record_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $action_type = null,
        ?string $action_url = null,
        ?string $cancel_reason = null,
        ?\DateTimeInterface $created_at = null,
        ?string $porting_order_id = null,
        RecordType|string|null $record_type = null,
        ?string $requirement_type_id = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action_type && $obj['action_type'] = $action_type;
        null !== $action_url && $obj['action_url'] = $action_url;
        null !== $cancel_reason && $obj['cancel_reason'] = $cancel_reason;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $requirement_type_id && $obj['requirement_type_id'] = $requirement_type_id;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Identifies the action requirement.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The type of action required.
     */
    public function withActionType(string $actionType): self
    {
        $obj = clone $this;
        $obj['action_type'] = $actionType;

        return $obj;
    }

    /**
     * Optional URL for the action.
     */
    public function withActionURL(?string $actionURL): self
    {
        $obj = clone $this;
        $obj['action_url'] = $actionURL;

        return $obj;
    }

    /**
     * Reason for cancellation if status is 'cancelled'.
     */
    public function withCancelReason(?string $cancelReason): self
    {
        $obj = clone $this;
        $obj['cancel_reason'] = $cancelReason;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The ID of the porting order this action requirement belongs to.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['porting_order_id'] = $portingOrderID;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The ID of the requirement type.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj['requirement_type_id'] = $requirementTypeID;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
