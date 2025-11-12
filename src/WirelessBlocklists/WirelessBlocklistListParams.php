<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all Wireless Blocklists belonging to the user.
 *
 * @see Telnyx\WirelessBlocklistsService::list()
 *
 * @phpstan-type WirelessBlocklistListParamsShape = array{
 *   filter_name_?: string,
 *   filter_type_?: string,
 *   filter_values_?: string,
 *   page_number_?: int,
 *   page_size_?: int,
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
    #[Api(optional: true)]
    public ?string $filter_name_;

    /**
     * When the Private Wireless Gateway was last updated.
     */
    #[Api(optional: true)]
    public ?string $filter_type_;

    /**
     * Values to filter on (inclusive).
     */
    #[Api(optional: true)]
    public ?string $filter_values_;

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
        ?string $filter_type_ = null,
        ?string $filter_values_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
    ): self {
        $obj = new self;

        null !== $filter_name_ && $obj->filter_name_ = $filter_name_;
        null !== $filter_type_ && $obj->filter_type_ = $filter_type_;
        null !== $filter_values_ && $obj->filter_values_ = $filter_values_;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;

        return $obj;
    }

    /**
     * The name of the Wireless Blocklist.
     */
    public function withFilterName(string $filterName): self
    {
        $obj = clone $this;
        $obj->filter_name_ = $filterName;

        return $obj;
    }

    /**
     * When the Private Wireless Gateway was last updated.
     */
    public function withFilterType(string $filterType): self
    {
        $obj = clone $this;
        $obj->filter_type_ = $filterType;

        return $obj;
    }

    /**
     * Values to filter on (inclusive).
     */
    public function withFilterValues(string $filterValues): self
    {
        $obj = clone $this;
        $obj->filter_values_ = $filterValues;

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
