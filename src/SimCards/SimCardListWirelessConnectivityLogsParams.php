<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API allows listing a paginated collection of Wireless Connectivity Logs associated with a SIM Card, for troubleshooting purposes.
 *
 * @see Telnyx\SimCards->listWirelessConnectivityLogs
 *
 * @phpstan-type SimCardListWirelessConnectivityLogsParamsShape = array{
 *   page_number_?: int, page_size_?: int
 * }
 */
final class SimCardListWirelessConnectivityLogsParams implements BaseModel
{
    /** @use SdkModel<SimCardListWirelessConnectivityLogsParamsShape> */
    use SdkModel;
    use SdkParams;

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
     */
    public static function with(
        ?int $page_number_ = null,
        ?int $page_size_ = null
    ): self {
        $obj = new self;

        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;

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
