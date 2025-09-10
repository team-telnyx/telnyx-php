<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardListWirelessConnectivityLogsParams); // set properties as needed
 * $client->simCards->listWirelessConnectivityLogs(...$params->toArray());
 * ```
 * This API allows listing a paginated collection of Wireless Connectivity Logs associated with a SIM Card, for troubleshooting purposes.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCards->listWirelessConnectivityLogs(...$params->toArray());`
 *
 * @see Telnyx\SimCards->listWirelessConnectivityLogs
 *
 * @phpstan-type sim_card_list_wireless_connectivity_logs_params = array{
 *   pageNumber?: int, pageSize?: int
 * }
 */
final class SimCardListWirelessConnectivityLogsParams implements BaseModel
{
    /** @use SdkModel<sim_card_list_wireless_connectivity_logs_params> */
    use SdkModel;
    use SdkParams;

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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $obj = new self;

        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;

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
