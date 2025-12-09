<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all SIM card groups belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\SimCardGroupsService::list()
 *
 * @phpstan-type SimCardGroupListParamsShape = array{
 *   filterName?: string,
 *   filterPrivateWirelessGatewayID?: string,
 *   filterWirelessBlocklistID?: string,
 *   pageNumber?: int,
 *   pageSize?: int,
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
    #[Optional]
    public ?string $filterName;

    /**
     * A Private Wireless Gateway ID associated with the group.
     */
    #[Optional]
    public ?string $filterPrivateWirelessGatewayID;

    /**
     * A Wireless Blocklist ID associated with the group.
     */
    #[Optional]
    public ?string $filterWirelessBlocklistID;

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
        ?string $filterName = null,
        ?string $filterPrivateWirelessGatewayID = null,
        ?string $filterWirelessBlocklistID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterPrivateWirelessGatewayID && $self['filterPrivateWirelessGatewayID'] = $filterPrivateWirelessGatewayID;
        null !== $filterWirelessBlocklistID && $self['filterWirelessBlocklistID'] = $filterWirelessBlocklistID;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * A valid SIM card group name.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * A Private Wireless Gateway ID associated with the group.
     */
    public function withFilterPrivateWirelessGatewayID(
        string $filterPrivateWirelessGatewayID
    ): self {
        $self = clone $this;
        $self['filterPrivateWirelessGatewayID'] = $filterPrivateWirelessGatewayID;

        return $self;
    }

    /**
     * A Wireless Blocklist ID associated with the group.
     */
    public function withFilterWirelessBlocklistID(
        string $filterWirelessBlocklistID
    ): self {
        $self = clone $this;
        $self['filterWirelessBlocklistID'] = $filterWirelessBlocklistID;

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
