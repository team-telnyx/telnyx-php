<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterStatus;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterType;

/**
 * This API allows listing a paginated collection a SIM card group actions. It allows to explore a collection of existing asynchronous operation using specific filters.
 *
 * @see Telnyx\Services\SimCardGroups\ActionsService::list()
 *
 * @phpstan-type ActionListParamsShape = array{
 *   filter_sim_card_group_id_?: string,
 *   filter_status_?: FilterStatus|value-of<FilterStatus>,
 *   filter_type_?: FilterType|value-of<FilterType>,
 *   page_number_?: int,
 *   page_size_?: int,
 * }
 */
final class ActionListParams implements BaseModel
{
    /** @use SdkModel<ActionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A valid SIM card group ID.
     */
    #[Api(optional: true)]
    public ?string $filter_sim_card_group_id_;

    /**
     * Filter by a specific status of the resource's lifecycle.
     *
     * @var value-of<FilterStatus>|null $filter_status_
     */
    #[Api(enum: FilterStatus::class, optional: true)]
    public ?string $filter_status_;

    /**
     * Filter by action type.
     *
     * @var value-of<FilterType>|null $filter_type_
     */
    #[Api(enum: FilterType::class, optional: true)]
    public ?string $filter_type_;

    /**
     * The page number to load.
     */
    #[Api(optional: true)]
    public ?int $page_number_;

    /**
     * The size of the page.
     */
    #[Api(optional: true)]
    public ?int $page_size_;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterStatus|value-of<FilterStatus> $filter_status_
     * @param FilterType|value-of<FilterType> $filter_type_
     */
    public static function with(
        ?string $filter_sim_card_group_id_ = null,
        FilterStatus|string|null $filter_status_ = null,
        FilterType|string|null $filter_type_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
    ): self {
        $obj = new self;

        null !== $filter_sim_card_group_id_ && $obj['filter_sim_card_group_id_'] = $filter_sim_card_group_id_;
        null !== $filter_status_ && $obj['filter_status_'] = $filter_status_;
        null !== $filter_type_ && $obj['filter_type_'] = $filter_type_;
        null !== $page_number_ && $obj['page_number_'] = $page_number_;
        null !== $page_size_ && $obj['page_size_'] = $page_size_;

        return $obj;
    }

    /**
     * A valid SIM card group ID.
     */
    public function withFilterSimCardGroupID(string $filterSimCardGroupID): self
    {
        $obj = clone $this;
        $obj['filter_sim_card_group_id_'] = $filterSimCardGroupID;

        return $obj;
    }

    /**
     * Filter by a specific status of the resource's lifecycle.
     *
     * @param FilterStatus|value-of<FilterStatus> $filterStatus
     */
    public function withFilterStatus(FilterStatus|string $filterStatus): self
    {
        $obj = clone $this;
        $obj['filter_status_'] = $filterStatus;

        return $obj;
    }

    /**
     * Filter by action type.
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filter_type_'] = $filterType;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number_'] = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size_'] = $pageSize;

        return $obj;
    }
}
