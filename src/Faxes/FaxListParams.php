<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\FaxListParams\Filter;

/**
 * View a list of faxes.
 *
 * @see Telnyx\Services\FaxesService::list()
 *
 * @phpstan-type FaxListParamsShape = array{
 *   filter?: Filter, page_number_?: int, page_size_?: int
 * }
 */
final class FaxListParams implements BaseModel
{
    /** @use SdkModel<FaxListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    #[Api(optional: true)]
    public ?int $page_number_;

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
     */
    public static function with(
        ?Filter $filter = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

        return $obj;
    }
}
