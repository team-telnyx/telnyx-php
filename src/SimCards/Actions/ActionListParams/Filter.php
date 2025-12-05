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
 * @phpstan-type FilterShape = array{
 *   action_type?: value-of<ActionType>|null,
 *   bulk_sim_card_action_id?: string|null,
 *   sim_card_id?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by action type.
     *
     * @var value-of<ActionType>|null $action_type
     */
    #[Api(enum: ActionType::class, optional: true)]
    public ?string $action_type;

    /**
     * Filter by a bulk SIM card action ID.
     */
    #[Api(optional: true)]
    public ?string $bulk_sim_card_action_id;

    /**
     * A valid SIM card ID.
     */
    #[Api(optional: true)]
    public ?string $sim_card_id;

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
     * @param ActionType|value-of<ActionType> $action_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ActionType|string|null $action_type = null,
        ?string $bulk_sim_card_action_id = null,
        ?string $sim_card_id = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $action_type && $obj['action_type'] = $action_type;
        null !== $bulk_sim_card_action_id && $obj['bulk_sim_card_action_id'] = $bulk_sim_card_action_id;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $status && $obj['status'] = $status;

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
        $obj['action_type'] = $actionType;

        return $obj;
    }

    /**
     * Filter by a bulk SIM card action ID.
     */
    public function withBulkSimCardActionID(string $bulkSimCardActionID): self
    {
        $obj = clone $this;
        $obj['bulk_sim_card_action_id'] = $bulkSimCardActionID;

        return $obj;
    }

    /**
     * A valid SIM card ID.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

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
        $obj['status'] = $status;

        return $obj;
    }
}
