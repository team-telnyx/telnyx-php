<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CidrBlock\CidrBlockPatternFilter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt\DateRangeFilter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Page;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List all Access IP Ranges.
 *
 * @see Telnyx\Services\AccessIPRangesService::list()
 *
 * @phpstan-type AccessIPRangeListParamsShape = array{
 *   filter?: Filter|array{
 *     cidrBlock?: string|null|CidrBlockPatternFilter,
 *     createdAt?: null|\DateTimeInterface|DateRangeFilter,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class AccessIPRangeListParams implements BaseModel
{
    /** @use SdkModel<AccessIPRangeListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   cidrBlock?: string|CidrBlockPatternFilter|null,
     *   createdAt?: \DateTimeInterface|DateRangeFilter|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     *
     * @param Filter|array{
     *   cidrBlock?: string|CidrBlockPatternFilter|null,
     *   createdAt?: \DateTimeInterface|DateRangeFilter|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
