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
 * @phpstan-import-type CreatedAtVariants from \Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter\CreatedAt
 * @phpstan-import-type CreatedAtShape from \Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: CreatedAtShape|null,
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
     *
     * @var CreatedAtVariants|null $createdAt
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
     * @param CreatedAtShape|null $createdAt
     */
    public static function with(
        \DateTimeInterface|DateRangeFilter|array|null $createdAt = null,
        ?string $ipAddress = null,
        ?string $ipSource = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $ipSource && $self['ipSource'] = $ipSource;

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

    /**
     * Filter by IP address.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    /**
     * Filter by IP source.
     */
    public function withIPSource(string $ipSource): self
    {
        $self = clone $this;
        $self['ipSource'] = $ipSource;

        return $self;
    }
}
