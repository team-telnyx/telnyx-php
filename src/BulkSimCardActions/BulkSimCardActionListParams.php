<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions;

use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API lists a paginated collection of bulk SIM card actions. A bulk SIM card action contains details about a collection of individual SIM card actions.
 *
 * @see Telnyx\BulkSimCardActionsService::list()
 *
 * @phpstan-type BulkSimCardActionListParamsShape = array{
 *   filter_action_type_?: FilterActionType|value-of<FilterActionType>,
 *   page_number_?: int,
 *   page_size_?: int,
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
     * @var value-of<FilterActionType>|null $filter_action_type_
     */
    #[Api(enum: FilterActionType::class, optional: true)]
    public ?string $filter_action_type_;

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
     * @param FilterActionType|value-of<FilterActionType> $filter_action_type_
     */
    public static function with(
        FilterActionType|string|null $filter_action_type_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
    ): self {
        $obj = new self;

        null !== $filter_action_type_ && $obj['filter_action_type_'] = $filter_action_type_;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;

        return $obj;
    }

    /**
     * Filter by action type.
     *
     * @param FilterActionType|value-of<FilterActionType> $filterActionType
     */
    public function withFilterActionType(
        FilterActionType|string $filterActionType
    ): self {
        $obj = clone $this;
        $obj['filter_action_type_'] = $filterActionType;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

        return $obj;
    }
}
