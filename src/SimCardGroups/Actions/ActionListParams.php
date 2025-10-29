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
 * @see Telnyx\SimCardGroups\Actions->list
 *
 * @phpstan-type ActionListParamsShape = array{
 *   filterSimCardGroupID?: string,
 *   filterStatus?: FilterStatus|value-of<FilterStatus>,
 *   filterType?: FilterType|value-of<FilterType>,
 *   pageNumber?: int,
 *   pageSize?: int,
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
    public ?string $filterSimCardGroupID;

    /**
     * Filter by a specific status of the resource's lifecycle.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Api(enum: FilterStatus::class, optional: true)]
    public ?string $filterStatus;

    /**
     * Filter by action type.
     *
     * @var value-of<FilterType>|null $filterType
     */
    #[Api(enum: FilterType::class, optional: true)]
    public ?string $filterType;

    /**
     * The page number to load.
     */
    #[Api(optional: true)]
    public ?int $pageNumber;

    /**
     * The size of the page.
     */
    #[Api(optional: true)]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterStatus|value-of<FilterStatus> $filterStatus
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        ?string $filterSimCardGroupID = null,
        FilterStatus|string|null $filterStatus = null,
        FilterType|string|null $filterType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $obj = new self;

        null !== $filterSimCardGroupID && $obj->filterSimCardGroupID = $filterSimCardGroupID;
        null !== $filterStatus && $obj['filterStatus'] = $filterStatus;
        null !== $filterType && $obj['filterType'] = $filterType;
        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * A valid SIM card group ID.
     */
    public function withFilterSimCardGroupID(string $filterSimCardGroupID): self
    {
        $obj = clone $this;
        $obj->filterSimCardGroupID = $filterSimCardGroupID;

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
        $obj['filterStatus'] = $filterStatus;

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
        $obj['filterType'] = $filterType;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }
}
