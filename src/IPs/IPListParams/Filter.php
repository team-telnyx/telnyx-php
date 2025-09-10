<?php

declare(strict_types=1);

namespace Telnyx\IPs\IPListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
 *
 * @phpstan-type filter_alias = array{
 *   connectionID?: string|null, ipAddress?: string|null, port?: int|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * IP adddress represented by this resource.
     */
    #[Api('ip_address', optional: true)]
    public ?string $ipAddress;

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
        ?string $connectionID = null,
        ?string $ipAddress = null,
        ?int $port = null
    ): self {
        $obj = new self;

        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $port && $obj->port = $port;

        return $obj;
    }

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * IP adddress represented by this resource.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    /**
     * Port to use when connecting to this IP.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

        return $obj;
    }
}
