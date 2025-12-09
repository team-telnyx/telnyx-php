<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a paginated list of inexplicit number orders.
 *
 * @see Telnyx\Services\InexplicitNumberOrdersService::list()
 *
 * @phpstan-type InexplicitNumberOrderListParamsShape = array{
 *   pageNumber?: int, pageSize?: int
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
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $obj = new self;

        null !== $pageNumber && $obj['pageNumber'] = $pageNumber;
        null !== $pageSize && $obj['pageSize'] = $pageSize;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['pageNumber'] = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }
}
