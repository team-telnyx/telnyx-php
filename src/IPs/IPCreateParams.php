<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new IP object.
 *
 * @see Telnyx\Services\IPsService::create()
 *
 * @phpstan-type IPCreateParamsShape = array{
 *   ipAddress: string, connectionID?: string|null, port?: int|null
 * }
 */
final class IPCreateParams implements BaseModel
{
    /** @use SdkModel<IPCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * IP adddress represented by this resource.
     */
    #[Required('ip_address')]
    public string $ipAddress;

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Port to use when connecting to this IP.
     */
    #[Optional]
    public ?int $port;

    /**
     * `new IPCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPCreateParams::with(ipAddress: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPCreateParams)->withIPAddress(...)
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
        $self = new self;

        $self['ipAddress'] = $ipAddress;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $port && $self['port'] = $port;

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
     * ID of the IP Connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

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
