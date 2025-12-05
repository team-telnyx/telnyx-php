<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a paginated list of inexplicit number orders.
 *
 * @see Telnyx\Services\InexplicitNumberOrdersService::list()
 *
 * @phpstan-type InexplicitNumberOrderListParamsShape = array{
 *   page_number?: int, page_size?: int
 * }
 */
final class InexplicitNumberOrderListParams implements BaseModel
{
    /** @use SdkModel<InexplicitNumberOrderListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The page number to load.
     */
    #[Api(optional: true)]
    public ?int $page_number;

    /**
     * The size of the page.
     */
    #[Api(optional: true)]
    public ?int $page_size;

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
        ?int $page_number = null,
        ?int $page_size = null
    ): self {
        $obj = new self;

        null !== $page_number && $obj['page_number'] = $page_number;
        null !== $page_size && $obj['page_size'] = $page_size;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number'] = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size'] = $pageSize;

        return $obj;
    }
}
