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
 * @phpstan-type FilterShape = array{
 *   id?: list<string>|null,
 *   action_type?: value-of<ActionType>|null,
 *   requirement_type_id?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
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
     * @var value-of<ActionType>|null $action_type
     */
    #[Api(enum: ActionType::class, optional: true)]
    public ?string $action_type;

    /**
     * Filter action requirements by requirement type ID.
     */
    #[Api(optional: true)]
    public ?string $requirement_type_id;

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
     * @param ActionType|value-of<ActionType> $action_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?array $id = null,
        ActionType|string|null $action_type = null,
        ?string $requirement_type_id = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action_type && $obj['action_type'] = $action_type;
        null !== $requirement_type_id && $obj['requirement_type_id'] = $requirement_type_id;
        null !== $status && $obj['status'] = $status;

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
        $obj['id'] = $id;

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
        $obj['action_type'] = $actionType;

        return $obj;
    }

    /**
     * Filter action requirements by requirement type ID.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj['requirement_type_id'] = $requirementTypeID;

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
        $obj['status'] = $status;

        return $obj;
    }
}
