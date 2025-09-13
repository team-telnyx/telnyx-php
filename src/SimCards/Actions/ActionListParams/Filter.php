<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\ActionListParams\Filter\ActionType;
use Telnyx\SimCards\Actions\ActionListParams\Filter\Status;

/**
 * Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type].
 *
 * @phpstan-type filter_alias = array{
 *   actionType?: value-of<ActionType>,
 *   bulkSimCardActionID?: string,
 *   simCardID?: string,
 *   status?: value-of<Status>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by action type.
     *
     * @var value-of<ActionType>|null $actionType
     */
    #[Api('action_type', enum: ActionType::class, optional: true)]
    public ?string $actionType;

    /**
     * Filter by a bulk SIM card action ID.
     */
    #[Api('bulk_sim_card_action_id', optional: true)]
    public ?string $bulkSimCardActionID;

    /**
     * A valid SIM card ID.
     */
    #[Api('sim_card_id', optional: true)]
    public ?string $simCardID;

    /**
     * Filter by a specific status of the resource's lifecycle.
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
     * @param ActionType|value-of<ActionType> $actionType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ActionType|string|null $actionType = null,
        ?string $bulkSimCardActionID = null,
        ?string $simCardID = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $actionType && $obj->actionType = $actionType instanceof ActionType ? $actionType->value : $actionType;
        null !== $bulkSimCardActionID && $obj->bulkSimCardActionID = $bulkSimCardActionID;
        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Filter by action type.
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
     * Filter by a bulk SIM card action ID.
     */
    public function withBulkSimCardActionID(string $bulkSimCardActionID): self
    {
        $obj = clone $this;
        $obj->bulkSimCardActionID = $bulkSimCardActionID;

        return $obj;
    }

    /**
     * A valid SIM card ID.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    /**
     * Filter by a specific status of the resource's lifecycle.
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
