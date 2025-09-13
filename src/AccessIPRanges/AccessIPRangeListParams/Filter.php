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
 * @phpstan-type filter_alias = array{
 *   cidrBlock?: string|CidrBlockPatternFilter,
 *   createdAt?: \DateTimeInterface|DateRangeFilter,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by exact CIDR block match.
     */
    #[Api('cidr_block', optional: true)]
    public string|CidrBlockPatternFilter|null $cidrBlock;

    /**
     * Filter by exact creation date-time.
     */
    #[Api('created_at', optional: true)]
    public \DateTimeInterface|DateRangeFilter|null $createdAt;

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
        string|CidrBlockPatternFilter|null $cidrBlock = null,
        \DateTimeInterface|DateRangeFilter|null $createdAt = null,
    ): self {
        $obj = new self;

        null !== $cidrBlock && $obj->cidrBlock = $cidrBlock;
        null !== $createdAt && $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Filter by exact CIDR block match.
     */
    public function withCidrBlock(
        string|CidrBlockPatternFilter $cidrBlock
    ): self {
        $obj = clone $this;
        $obj->cidrBlock = $cidrBlock;

        return $obj;
    }

    /**
     * Filter by exact creation date-time.
     */
    public function withCreatedAt(
        \DateTimeInterface|DateRangeFilter $createdAt
    ): self {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }
}
