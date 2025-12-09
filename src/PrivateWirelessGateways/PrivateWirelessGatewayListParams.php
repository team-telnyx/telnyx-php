<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all Private Wireless Gateways belonging to the user.
 *
 * @see Telnyx\Services\PrivateWirelessGatewaysService::list()
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
    #[Optional]
    public ?string $filterCreatedAt;

    /**
     * The IP address range of the Private Wireless Gateway.
     */
    #[Optional]
    public ?string $filterIPRange;

    /**
     * The name of the Private Wireless Gateway.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    #[Optional]
    public ?string $filterRegionCode;

    /**
     * When the Private Wireless Gateway was last updated.
     */
    #[Optional]
    public ?string $filterUpdatedAt;

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
        ?string $filterCreatedAt = null,
        ?string $filterIPRange = null,
        ?string $filterName = null,
        ?string $filterRegionCode = null,
        ?string $filterUpdatedAt = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterCreatedAt && $self['filterCreatedAt'] = $filterCreatedAt;
        null !== $filterIPRange && $self['filterIPRange'] = $filterIPRange;
        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterRegionCode && $self['filterRegionCode'] = $filterRegionCode;
        null !== $filterUpdatedAt && $self['filterUpdatedAt'] = $filterUpdatedAt;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Private Wireless Gateway resource creation date.
     */
    public function withFilterCreatedAt(string $filterCreatedAt): self
    {
        $self = clone $this;
        $self['filterCreatedAt'] = $filterCreatedAt;

        return $self;
    }

    /**
     * The IP address range of the Private Wireless Gateway.
     */
    public function withFilterIPRange(string $filterIPRange): self
    {
        $self = clone $this;
        $self['filterIPRange'] = $filterIPRange;

        return $self;
    }

    /**
     * The name of the Private Wireless Gateway.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    public function withFilterRegionCode(string $filterRegionCode): self
    {
        $self = clone $this;
        $self['filterRegionCode'] = $filterRegionCode;

        return $self;
    }

    /**
     * When the Private Wireless Gateway was last updated.
     */
    public function withFilterUpdatedAt(string $filterUpdatedAt): self
    {
        $self = clone $this;
        $self['filterUpdatedAt'] = $filterUpdatedAt;

        return $self;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
