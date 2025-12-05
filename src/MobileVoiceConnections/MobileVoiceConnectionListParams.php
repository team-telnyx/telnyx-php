<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List Mobile Voice Connections.
 *
 * @see Telnyx\Services\MobileVoiceConnectionsService::list()
 *
 * @phpstan-type MobileVoiceConnectionListParamsShape = array{
 *   filter_connection_name__contains_?: string,
 *   page_number_?: int,
 *   page_size_?: int,
 *   sort?: string,
 * }
 */
final class MobileVoiceConnectionListParams implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by connection name containing the given string.
     */
    #[Api(optional: true)]
    public ?string $filter_connection_name__contains_;

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

    /**
     * Sort by field (e.g., created_at, connection_name, active). Prefix with - for descending order.
     */
    #[Api(optional: true)]
    public ?string $sort;

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
        ?string $filter_connection_name__contains_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
        ?string $sort = null,
    ): self {
        $obj = new self;

        null !== $filter_connection_name__contains_ && $obj['filter_connection_name__contains_'] = $filter_connection_name__contains_;
        null !== $page_number_ && $obj['page_number_'] = $page_number_;
        null !== $page_size_ && $obj['page_size_'] = $page_size_;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Filter by connection name containing the given string.
     */
    public function withFilterConnectionNameContains(
        string $filterConnectionNameContains
    ): self {
        $obj = clone $this;
        $obj['filter_connection_name__contains_'] = $filterConnectionNameContains;

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

    /**
     * Sort by field (e.g., created_at, connection_name, active). Prefix with - for descending order.
     */
    public function withSort(string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
