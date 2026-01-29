<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions;

use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API lists a paginated collection of bulk SIM card actions. A bulk SIM card action contains details about a collection of individual SIM card actions.
 *
 * @see Telnyx\Services\BulkSimCardActionsService::list()
 *
 * @phpstan-type BulkSimCardActionListParamsShape = array{
 *   filterActionType?: null|FilterActionType|value-of<FilterActionType>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class BulkSimCardActionListParams implements BaseModel
{
    /** @use SdkModel<BulkSimCardActionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by action type.
     *
     * @var value-of<FilterActionType>|null $filterActionType
     */
    #[Optional(enum: FilterActionType::class)]
    public ?string $filterActionType;

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
     * @param FilterActionType|value-of<FilterActionType>|null $filterActionType
     */
    public static function with(
        FilterActionType|string|null $filterActionType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterActionType && $self['filterActionType'] = $filterActionType;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by action type.
     *
     * @param FilterActionType|value-of<FilterActionType> $filterActionType
     */
    public function withFilterActionType(
        FilterActionType|string $filterActionType
    ): self {
        $self = clone $this;
        $self['filterActionType'] = $filterActionType;

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
