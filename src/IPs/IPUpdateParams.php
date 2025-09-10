<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new IPUpdateParams); // set properties as needed
 * $client->ips->update(...$params->toArray());
 * ```
 * Update the details of a specific IP.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ips->update(...$params->toArray());`
 *
 * @see Telnyx\IPs->update
 *
 * @phpstan-type ip_update_params = array{
 *   ipAddress: string, connectionID?: string, port?: int
 * }
 */
final class IPUpdateParams implements BaseModel
{
    /** @use SdkModel<ip_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * IP adddress represented by this resource.
     */
    #[Api('ip_address')]
    public string $ipAddress;

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

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
     * IPUpdateParams::with(ipAddress: ...)
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
        string $ipAddress,
        ?string $connectionID = null,
        ?int $port = null
    ): self {
        $obj = new self;

        $obj->ipAddress = $ipAddress;

        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $port && $obj->port = $port;

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
     * ID of the IP Connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

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
