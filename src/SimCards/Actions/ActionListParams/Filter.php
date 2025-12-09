<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\ActionListParams\Filter\ActionType;
use Telnyx\SimCards\Actions\ActionListParams\Filter\Status;

/**
 * Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type].
 *
 * @phpstan-type FilterShape = array{
 *   actionType?: value-of<ActionType>|null,
 *   bulkSimCardActionID?: string|null,
 *   simCardID?: string|null,
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
     * @var value-of<ActionType>|null $actionType
     */
    #[Optional('action_type', enum: ActionType::class)]
    public ?string $actionType;

    /**
     * Filter by a bulk SIM card action ID.
     */
    #[Optional('bulk_sim_card_action_id')]
    public ?string $bulkSimCardActionID;

    /**
     * A valid SIM card ID.
     */
    #[Optional('sim_card_id')]
    public ?string $simCardID;

    /**
     * Filter by a specific status of the resource's lifecycle.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
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
        $self = new self;

        null !== $actionType && $self['actionType'] = $actionType;
        null !== $bulkSimCardActionID && $self['bulkSimCardActionID'] = $bulkSimCardActionID;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by action type.
     *
     * @param ActionType|value-of<ActionType> $actionType
     */
    public function withActionType(ActionType|string $actionType): self
    {
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    /**
     * Filter by a bulk SIM card action ID.
     */
    public function withBulkSimCardActionID(string $bulkSimCardActionID): self
    {
        $self = clone $this;
        $self['bulkSimCardActionID'] = $bulkSimCardActionID;

        return $self;
    }

    /**
     * A valid SIM card ID.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * Filter by a specific status of the resource's lifecycle.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
