<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all Private Wireless Gateways belonging to the user.
 *
 * @see Telnyx\PrivateWirelessGatewaysService::list()
 *
 * @phpstan-type PrivateWirelessGatewayListParamsShape = array{
 *   filter_created_at_?: string,
 *   filter_ip_range_?: string,
 *   filter_name_?: string,
 *   filter_region_code_?: string,
 *   filter_updated_at_?: string,
 *   page_number_?: int,
 *   page_size_?: int,
 * }
 */
final class PrivateWirelessGatewayListParams implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Private Wireless Gateway resource creation date.
     */
    #[Api(optional: true)]
    public ?string $filter_created_at_;

    /**
     * The IP address range of the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?string $filter_ip_range_;

    /**
     * The name of the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?string $filter_name_;

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    #[Api(optional: true)]
    public ?string $filter_region_code_;

    /**
     * When the Private Wireless Gateway was last updated.
     */
    #[Api(optional: true)]
    public ?string $filter_updated_at_;

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
        ?string $filter_created_at_ = null,
        ?string $filter_ip_range_ = null,
        ?string $filter_name_ = null,
        ?string $filter_region_code_ = null,
        ?string $filter_updated_at_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
    ): self {
        $obj = new self;

        null !== $filter_created_at_ && $obj->filter_created_at_ = $filter_created_at_;
        null !== $filter_ip_range_ && $obj->filter_ip_range_ = $filter_ip_range_;
        null !== $filter_name_ && $obj->filter_name_ = $filter_name_;
        null !== $filter_region_code_ && $obj->filter_region_code_ = $filter_region_code_;
        null !== $filter_updated_at_ && $obj->filter_updated_at_ = $filter_updated_at_;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;

        return $obj;
    }

    /**
     * Private Wireless Gateway resource creation date.
     */
    public function withFilterCreatedAt(string $filterCreatedAt): self
    {
        $obj = clone $this;
        $obj->filter_created_at_ = $filterCreatedAt;

        return $obj;
    }

    /**
     * The IP address range of the Private Wireless Gateway.
     */
    public function withFilterIPRange(string $filterIPRange): self
    {
        $obj = clone $this;
        $obj->filter_ip_range_ = $filterIPRange;

        return $obj;
    }

    /**
     * The name of the Private Wireless Gateway.
     */
    public function withFilterName(string $filterName): self
    {
        $obj = clone $this;
        $obj->filter_name_ = $filterName;

        return $obj;
    }

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    public function withFilterRegionCode(string $filterRegionCode): self
    {
        $obj = clone $this;
        $obj->filter_region_code_ = $filterRegionCode;

        return $obj;
    }

    /**
     * When the Private Wireless Gateway was last updated.
     */
    public function withFilterUpdatedAt(string $filterUpdatedAt): self
    {
        $obj = clone $this;
        $obj->filter_updated_at_ = $filterUpdatedAt;

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
