<?php

declare(strict_types=1);

namespace Telnyx\IPs\IPListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
 *
 * @phpstan-type FilterShape = array{
 *   connectionID?: string|null, ipAddress?: string|null, port?: int|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * IP adddress represented by this resource.
     */
    #[Optional('ip_address')]
    public ?string $ipAddress;

    /**
     * Port to use when connecting to this IP.
     */
    #[Optional]
    public ?int $port;

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
        ?string $connectionID = null,
        ?string $ipAddress = null,
        ?int $port = null
    ): self {
        $self = new self;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $port && $self['port'] = $port;

        return $self;
    }

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * IP adddress represented by this resource.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    /**
     * Port to use when connecting to this IP.
     */
    public function withPort(int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }
}
