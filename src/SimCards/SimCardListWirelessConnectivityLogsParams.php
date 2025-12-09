<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API allows listing a paginated collection of Wireless Connectivity Logs associated with a SIM Card, for troubleshooting purposes.
 *
 * @see Telnyx\Services\SimCardsService::listWirelessConnectivityLogs()
 *
 * @phpstan-type SimCardListWirelessConnectivityLogsParamsShape = array{
 *   pageNumber?: int, pageSize?: int
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
