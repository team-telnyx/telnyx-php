<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all SIM card groups belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\SimCardGroupsService::list()
 *
 * @phpstan-type SimCardGroupListParamsShape = array{
 *   filter_name_?: string,
 *   filter_private_wireless_gateway_id_?: string,
 *   filter_wireless_blocklist_id_?: string,
 *   page_number_?: int,
 *   page_size_?: int,
 * }
 */
final class SimCardGroupListParams implements BaseModel
{
    /** @use SdkModel<SimCardGroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A valid SIM card group name.
     */
    #[Api(optional: true)]
    public ?string $filter_name_;

    /**
     * A Private Wireless Gateway ID associated with the group.
     */
    #[Api(optional: true)]
    public ?string $filter_private_wireless_gateway_id_;

    /**
     * A Wireless Blocklist ID associated with the group.
     */
    #[Api(optional: true)]
    public ?string $filter_wireless_blocklist_id_;

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
        ?string $filter_name_ = null,
        ?string $filter_private_wireless_gateway_id_ = null,
        ?string $filter_wireless_blocklist_id_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
    ): self {
        $obj = new self;

        null !== $filter_name_ && $obj['filter_name_'] = $filter_name_;
        null !== $filter_private_wireless_gateway_id_ && $obj['filter_private_wireless_gateway_id_'] = $filter_private_wireless_gateway_id_;
        null !== $filter_wireless_blocklist_id_ && $obj['filter_wireless_blocklist_id_'] = $filter_wireless_blocklist_id_;
        null !== $page_number_ && $obj['page_number_'] = $page_number_;
        null !== $page_size_ && $obj['page_size_'] = $page_size_;

        return $obj;
    }

    /**
     * A valid SIM card group name.
     */
    public function withFilterName(string $filterName): self
    {
        $obj = clone $this;
        $obj['filter_name_'] = $filterName;

        return $obj;
    }

    /**
     * A Private Wireless Gateway ID associated with the group.
     */
    public function withFilterPrivateWirelessGatewayID(
        string $filterPrivateWirelessGatewayID
    ): self {
        $obj = clone $this;
        $obj['filter_private_wireless_gateway_id_'] = $filterPrivateWirelessGatewayID;

        return $obj;
    }

    /**
     * A Wireless Blocklist ID associated with the group.
     */
    public function withFilterWirelessBlocklistID(
        string $filterWirelessBlocklistID
    ): self {
        $obj = clone $this;
        $obj['filter_wireless_blocklist_id_'] = $filterWirelessBlocklistID;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number_'] = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size_'] = $pageSize;

        return $obj;
    }
}
