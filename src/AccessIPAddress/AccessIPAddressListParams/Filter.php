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
 * @phpstan-type filter_alias = array{
 *   createdAt?: null|\DateTimeInterface|DateRangeFilter,
 *   ipAddress?: string|null,
 *   ipSource?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by exact creation date-time.
     */
    #[Api('created_at', optional: true)]
    public \DateTimeInterface|DateRangeFilter|null $createdAt;

    /**
     * Filter by IP address.
     */
    #[Api('ip_address', optional: true)]
    public ?string $ipAddress;

    /**
     * Filter by IP source.
     */
    #[Api('ip_source', optional: true)]
    public ?string $ipSource;

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
        \DateTimeInterface|DateRangeFilter|null $createdAt = null,
        ?string $ipAddress = null,
        ?string $ipSource = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $ipSource && $obj->ipSource = $ipSource;

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

    /**
     * Filter by IP address.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    /**
     * Filter by IP source.
     */
    public function withIPSource(string $ipSource): self
    {
        $obj = clone $this;
        $obj->ipSource = $ipSource;

        return $obj;
    }
}
