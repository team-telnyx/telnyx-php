<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all Wireless Blocklists belonging to the user.
 *
 * @see Telnyx\Services\WirelessBlocklistsService::list()
 *
 * @phpstan-type WirelessBlocklistListParamsShape = array{
 *   filterName?: string|null,
 *   filterType?: string|null,
 *   filterValues?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class WirelessBlocklistListParams implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the Wireless Blocklist.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * When the Private Wireless Gateway was last updated.
     */
    #[Optional]
    public ?string $filterType;

    /**
     * Values to filter on (inclusive).
     */
    #[Optional]
    public ?string $filterValues;

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
        ?string $filterType = null,
        ?string $filterValues = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterType && $self['filterType'] = $filterType;
        null !== $filterValues && $self['filterValues'] = $filterValues;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * The name of the Wireless Blocklist.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * When the Private Wireless Gateway was last updated.
     */
    public function withFilterType(string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Values to filter on (inclusive).
     */
    public function withFilterValues(string $filterValues): self
    {
        $self = clone $this;
        $self['filterValues'] = $filterValues;

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
