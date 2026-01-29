<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Optional;
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
 *   filterSimCardGroupID?: string|null,
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 *   filterType?: null|FilterType|value-of<FilterType>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
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
    #[Optional]
    public ?string $filterSimCardGroupID;

    /**
     * Filter by a specific status of the resource's lifecycle.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Optional(enum: FilterStatus::class)]
    public ?string $filterStatus;

    /**
     * Filter by action type.
     *
     * @var value-of<FilterType>|null $filterType
     */
    #[Optional(enum: FilterType::class)]
    public ?string $filterType;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * The size of the page.
     */
    #[Optional]
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
     * @param FilterStatus|value-of<FilterStatus>|null $filterStatus
     * @param FilterType|value-of<FilterType>|null $filterType
     */
    public static function with(
        ?string $filterSimCardGroupID = null,
        FilterStatus|string|null $filterStatus = null,
        FilterType|string|null $filterType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterSimCardGroupID && $self['filterSimCardGroupID'] = $filterSimCardGroupID;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $filterType && $self['filterType'] = $filterType;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * A valid SIM card group ID.
     */
    public function withFilterSimCardGroupID(string $filterSimCardGroupID): self
    {
        $self = clone $this;
        $self['filterSimCardGroupID'] = $filterSimCardGroupID;

        return $self;
    }

    /**
     * Filter by a specific status of the resource's lifecycle.
     *
     * @param FilterStatus|value-of<FilterStatus> $filterStatus
     */
    public function withFilterStatus(FilterStatus|string $filterStatus): self
    {
        $self = clone $this;
        $self['filterStatus'] = $filterStatus;

        return $self;
    }

    /**
     * Filter by action type.
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
