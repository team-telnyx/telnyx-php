<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the details of a specific IP.
 *
 * @see Telnyx\Services\IPsService::update()
 *
 * @phpstan-type IPUpdateParamsShape = array{
 *   ip_address: string, connection_id?: string, port?: int
 * }
 */
final class IPUpdateParams implements BaseModel
{
    /** @use SdkModel<IPUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * IP adddress represented by this resource.
     */
    #[Api]
    public string $ip_address;

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * Port to use when connecting to this IP.
     */
    #[Api(optional: true)]
    public ?int $port;

    /**
     * `new IPUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPUpdateParams::with(ip_address: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPUpdateParams)->withIPAddress(...)
     * ```
     */
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
        string $ip_address,
        ?string $connection_id = null,
        ?int $port = null
    ): self {
        $obj = new self;

        $obj->ip_address = $ip_address;

        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $port && $obj->port = $port;

        return $obj;
    }

    /**
     * IP adddress represented by this resource.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ip_address = $ipAddress;

        return $obj;
    }

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

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
