<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists a paginated collection of SIM card data usage notifications. It enables exploring the collection using specific filters.
 *
 * @see Telnyx\SimCardDataUsageNotifications->list
 *
 * @phpstan-type SimCardDataUsageNotificationListParamsShape = array{
 *   filterSimCardID?: string, pageNumber?: int, pageSize?: int
 * }
 */
final class SimCardDataUsageNotificationListParams implements BaseModel
{
    /** @use SdkModel<SimCardDataUsageNotificationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A valid SIM card ID.
     */
    #[Api(optional: true)]
    public ?string $filterSimCardID;

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
     */
    public static function with(
        ?string $filterSimCardID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $obj = new self;

        null !== $filterSimCardID && $obj->filterSimCardID = $filterSimCardID;
        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * A valid SIM card ID.
     */
    public function withFilterSimCardID(string $filterSimCardID): self
    {
        $obj = clone $this;
        $obj->filterSimCardID = $filterSimCardID;

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
