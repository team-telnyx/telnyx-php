<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges\AccessIPRangeListParams;

use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CidrBlock\CidrBlockPatternFilter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt\DateRangeFilter;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
 *
 * @phpstan-type FilterShape = array{
 *   cidr_block?: string|null|CidrBlockPatternFilter,
 *   created_at?: null|\DateTimeInterface|DateRangeFilter,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact CIDR block match.
     */
    #[Api(optional: true)]
    public string|CidrBlockPatternFilter|null $cidr_block;

    /**
     * Filter by exact creation date-time.
     */
    #[Api(optional: true)]
    public \DateTimeInterface|DateRangeFilter|null $created_at;

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
        string|CidrBlockPatternFilter|null $cidr_block = null,
        \DateTimeInterface|DateRangeFilter|null $created_at = null,
    ): self {
        $obj = new self;

        null !== $cidr_block && $obj->cidr_block = $cidr_block;
        null !== $created_at && $obj->created_at = $created_at;

        return $obj;
    }

    /**
     * Filter by exact CIDR block match.
     */
    public function withCidrBlock(
        string|CidrBlockPatternFilter $cidrBlock
    ): self {
        $obj = clone $this;
        $obj->cidr_block = $cidrBlock;

        return $obj;
    }

    /**
     * Filter by exact creation date-time.
     */
    public function withCreatedAt(
        \DateTimeInterface|DateRangeFilter $createdAt
    ): self {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }
}
