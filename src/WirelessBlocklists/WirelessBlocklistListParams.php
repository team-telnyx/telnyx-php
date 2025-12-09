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
 *   filterName?: string,
 *   filterType?: string,
 *   filterValues?: string,
 *   pageNumber?: int,
 *   pageSize?: int,
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
        $obj = new self;

        null !== $filterName && $obj['filterName'] = $filterName;
        null !== $filterType && $obj['filterType'] = $filterType;
        null !== $filterValues && $obj['filterValues'] = $filterValues;
        null !== $pageNumber && $obj['pageNumber'] = $pageNumber;
        null !== $pageSize && $obj['pageSize'] = $pageSize;

        return $obj;
    }

    /**
     * The name of the Wireless Blocklist.
     */
    public function withFilterName(string $filterName): self
    {
        $obj = clone $this;
        $obj['filterName'] = $filterName;

        return $obj;
    }

    /**
     * When the Private Wireless Gateway was last updated.
     */
    public function withFilterType(string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    /**
     * Values to filter on (inclusive).
     */
    public function withFilterValues(string $filterValues): self
    {
        $obj = clone $this;
        $obj['filterValues'] = $filterValues;

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
