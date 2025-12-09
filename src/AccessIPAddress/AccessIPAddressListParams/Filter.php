<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress\AccessIPAddressListParams;

use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter\CreatedAt\DateRangeFilter;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|\DateTimeInterface|DateRangeFilter,
 *   ipAddress?: string|null,
 *   ipSource?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact creation date-time.
     */
    #[Optional('created_at')]
    public \DateTimeInterface|DateRangeFilter|null $createdAt;

    /**
     * Filter by IP address.
     */
    #[Optional('ip_address')]
    public ?string $ipAddress;

    /**
     * Filter by IP source.
     */
    #[Optional('ip_source')]
    public ?string $ipSource;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param \DateTimeInterface|DateRangeFilter|array{
     *   gt?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lt?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $createdAt
     */
    public static function with(
        \DateTimeInterface|DateRangeFilter|array|null $createdAt = null,
        ?string $ipAddress = null,
        ?string $ipSource = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $ipAddress && $obj['ipAddress'] = $ipAddress;
        null !== $ipSource && $obj['ipSource'] = $ipSource;

        return $obj;
    }

    /**
     * Filter by exact creation date-time.
     *
     * @param \DateTimeInterface|DateRangeFilter|array{
     *   gt?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lt?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $createdAt
     */
    public function withCreatedAt(
        \DateTimeInterface|DateRangeFilter|array $createdAt
    ): self {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Filter by IP address.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ipAddress'] = $ipAddress;

        return $obj;
    }

    /**
     * Filter by IP source.
     */
    public function withIPSource(string $ipSource): self
    {
        $obj = clone $this;
        $obj['ipSource'] = $ipSource;

        return $obj;
    }
}
