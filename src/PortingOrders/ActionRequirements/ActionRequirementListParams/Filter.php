<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\ActionType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status].
 *
 * @phpstan-type filter_alias = array{
 *   id?: list<string>|null,
 *   actionType?: value-of<ActionType>|null,
 *   requirementTypeID?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter action requirements by a list of IDs.
     *
     * @var list<string>|null $id
     */
    #[Api(list: 'string', optional: true)]
    public ?array $id;

    /**
     * Filter action requirements by action type.
     *
     * @var value-of<ActionType>|null $actionType
     */
    #[Api('action_type', enum: ActionType::class, optional: true)]
    public ?string $actionType;

    /**
     * Filter action requirements by requirement type ID.
     */
    #[Api('requirement_type_id', optional: true)]
    public ?string $requirementTypeID;

    /**
     * Filter action requirements by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $id
     * @param ActionType|value-of<ActionType> $actionType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?array $id = null,
        ActionType|string|null $actionType = null,
        ?string $requirementTypeID = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $actionType && $obj->actionType = $actionType instanceof ActionType ? $actionType->value : $actionType;
        null !== $requirementTypeID && $obj->requirementTypeID = $requirementTypeID;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Filter action requirements by a list of IDs.
     *
     * @param list<string> $id
     */
    public function withID(array $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Filter action requirements by action type.
     *
     * @param ActionType|value-of<ActionType> $actionType
     */
    public function withActionType(ActionType|string $actionType): self
    {
        $obj = clone $this;
        $obj->actionType = $actionType instanceof ActionType ? $actionType->value : $actionType;

        return $obj;
    }

    /**
     * Filter action requirements by requirement type ID.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj->requirementTypeID = $requirementTypeID;

        return $obj;
    }

    /**
     * Filter action requirements by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
