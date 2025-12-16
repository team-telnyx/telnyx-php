<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges\AccessIPRangeListParams;

use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CidrBlock\CidrBlockPatternFilter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt\DateRangeFilter;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
 *
 * @phpstan-import-type CidrBlockShape from \Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CidrBlock
 * @phpstan-import-type CreatedAtShape from \Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   cidrBlock?: CidrBlockShape|null, createdAt?: CreatedAtShape|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact CIDR block match.
     */
    #[Optional('cidr_block')]
    public string|CidrBlockPatternFilter|null $cidrBlock;

    /**
     * Filter by exact creation date-time.
     */
    #[Optional('created_at')]
    public \DateTimeInterface|DateRangeFilter|null $createdAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CidrBlockShape $cidrBlock
     * @param CreatedAtShape $createdAt
     */
    public static function with(
        string|CidrBlockPatternFilter|array|null $cidrBlock = null,
        \DateTimeInterface|DateRangeFilter|array|null $createdAt = null,
    ): self {
        $self = new self;

        null !== $cidrBlock && $self['cidrBlock'] = $cidrBlock;
        null !== $createdAt && $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter by exact CIDR block match.
     *
     * @param CidrBlockShape $cidrBlock
     */
    public function withCidrBlock(
        string|CidrBlockPatternFilter|array $cidrBlock
    ): self {
        $self = clone $this;
        $self['cidrBlock'] = $cidrBlock;

        return $self;
    }

    /**
     * Filter by exact creation date-time.
     *
     * @param CreatedAtShape $createdAt
     */
    public function withCreatedAt(
        \DateTimeInterface|DateRangeFilter|array $createdAt
    ): self {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }
}
