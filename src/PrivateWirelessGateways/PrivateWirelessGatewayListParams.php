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
 * @see Telnyx\PrivateWirelessGateways->list
 *
 * @phpstan-type PrivateWirelessGatewayListParamsShape = array{
 *   filterCreatedAt?: string,
 *   filterIPRange?: string,
 *   filterName?: string,
 *   filterRegionCode?: string,
 *   filterUpdatedAt?: string,
 *   pageNumber?: int,
 *   pageSize?: int,
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
    public ?string $filterCreatedAt;

    /**
     * The IP address range of the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?string $filterIPRange;

    /**
     * The name of the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?string $filterName;

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    #[Api(optional: true)]
    public ?string $filterRegionCode;

    /**
     * When the Private Wireless Gateway was last updated.
     */
    #[Api(optional: true)]
    public ?string $filterUpdatedAt;

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
        ?string $filterCreatedAt = null,
        ?string $filterIPRange = null,
        ?string $filterName = null,
        ?string $filterRegionCode = null,
        ?string $filterUpdatedAt = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $obj = new self;

        null !== $filterCreatedAt && $obj->filterCreatedAt = $filterCreatedAt;
        null !== $filterIPRange && $obj->filterIPRange = $filterIPRange;
        null !== $filterName && $obj->filterName = $filterName;
        null !== $filterRegionCode && $obj->filterRegionCode = $filterRegionCode;
        null !== $filterUpdatedAt && $obj->filterUpdatedAt = $filterUpdatedAt;
        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Private Wireless Gateway resource creation date.
     */
    public function withFilterCreatedAt(string $filterCreatedAt): self
    {
        $obj = clone $this;
        $obj->filterCreatedAt = $filterCreatedAt;

        return $obj;
    }

    /**
     * The IP address range of the Private Wireless Gateway.
     */
    public function withFilterIPRange(string $filterIPRange): self
    {
        $obj = clone $this;
        $obj->filterIPRange = $filterIPRange;

        return $obj;
    }

    /**
     * The name of the Private Wireless Gateway.
     */
    public function withFilterName(string $filterName): self
    {
        $obj = clone $this;
        $obj->filterName = $filterName;

        return $obj;
    }

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    public function withFilterRegionCode(string $filterRegionCode): self
    {
        $obj = clone $this;
        $obj->filterRegionCode = $filterRegionCode;

        return $obj;
    }

    /**
     * When the Private Wireless Gateway was last updated.
     */
    public function withFilterUpdatedAt(string $filterUpdatedAt): self
    {
        $obj = clone $this;
        $obj->filterUpdatedAt = $filterUpdatedAt;

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
