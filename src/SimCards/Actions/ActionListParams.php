<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\ActionListParams\Filter;
use Telnyx\SimCards\Actions\ActionListParams\Filter\ActionType;
use Telnyx\SimCards\Actions\ActionListParams\Filter\Status;
use Telnyx\SimCards\Actions\ActionListParams\Page;

/**
 * This API lists a paginated collection of SIM card actions. It enables exploring a collection of existing asynchronous operations using specific filters.
 *
 * @see Telnyx\Services\SimCards\ActionsService::list()
 *
 * @phpstan-type ActionListParamsShape = array{
 *   filter?: Filter|array{
 *     action_type?: value-of<ActionType>|null,
 *     bulk_sim_card_action_id?: string|null,
 *     sim_card_id?: string|null,
 *     status?: value-of<Status>|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class ActionListParams implements BaseModel
{
    /** @use SdkModel<ActionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   action_type?: value-of<ActionType>|null,
     *   bulk_sim_card_action_id?: string|null,
     *   sim_card_id?: string|null,
     *   status?: value-of<Status>|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type].
     *
     * @param Filter|array{
     *   action_type?: value-of<ActionType>|null,
     *   bulk_sim_card_action_id?: string|null,
     *   sim_card_id?: string|null,
     *   status?: value-of<Status>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
