<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress\AccessIPAddressListParams;

use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter\CreatedAt\DateRangeFilter;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: null|\DateTimeInterface|DateRangeFilter,
 *   ip_address?: string|null,
 *   ip_source?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact creation date-time.
     */
    #[Api(optional: true)]
    public \DateTimeInterface|DateRangeFilter|null $created_at;

    /**
     * Filter by IP address.
     */
    #[Api(optional: true)]
    public ?string $ip_address;

    /**
     * Filter by IP source.
     */
    #[Api(optional: true)]
    public ?string $ip_source;

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
        \DateTimeInterface|DateRangeFilter|null $created_at = null,
        ?string $ip_address = null,
        ?string $ip_source = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $ip_address && $obj->ip_address = $ip_address;
        null !== $ip_source && $obj->ip_source = $ip_source;

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

    /**
     * Filter by IP address.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ip_address = $ipAddress;

        return $obj;
    }

    /**
     * Filter by IP source.
     */
    public function withIPSource(string $ipSource): self
    {
        $obj = clone $this;
        $obj->ip_source = $ipSource;

        return $obj;
    }
}
