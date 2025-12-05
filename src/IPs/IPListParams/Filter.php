<?php

declare(strict_types=1);

namespace Telnyx\IPs\IPListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
 *
 * @phpstan-type FilterShape = array{
 *   connection_id?: string|null, ip_address?: string|null, port?: int|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * IP adddress represented by this resource.
     */
    #[Api(optional: true)]
    public ?string $ip_address;

    /**
     * Port to use when connecting to this IP.
     */
    #[Api(optional: true)]
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
        ?string $connection_id = null,
        ?string $ip_address = null,
        ?int $port = null
    ): self {
        $obj = new self;

        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $ip_address && $obj['ip_address'] = $ip_address;
        null !== $port && $obj['port'] = $port;

        return $obj;
    }

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * IP adddress represented by this resource.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ip_address'] = $ipAddress;

        return $obj;
    }

    /**
     * Port to use when connecting to this IP.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj['port'] = $port;

        return $obj;
    }
}
