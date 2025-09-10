<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new GlobalIPCreateParams); // set properties as needed
 * $client->globalIPs->create(...$params->toArray());
 * ```
 * Create a Global IP.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->globalIPs->create(...$params->toArray());`
 *
 * @see Telnyx\GlobalIPs->create
 *
 * @phpstan-type global_ip_create_params = array{
 *   description?: string, name?: string, ports?: array<string, mixed>
 * }
 */
final class GlobalIPCreateParams implements BaseModel
{
    /** @use SdkModel<global_ip_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A user specified description for the address.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * A user specified name for the address.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * A Global IP ports grouped by protocol code.
     *
     * @var array<string, mixed>|null $ports
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $ports;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string, mixed> $ports
     */
    public static function with(
        ?string $description = null,
        ?string $name = null,
        ?array $ports = null
    ): self {
        $obj = new self;

        null !== $description && $obj->description = $description;
        null !== $name && $obj->name = $name;
        null !== $ports && $obj->ports = $ports;

        return $obj;
    }

    /**
     * A user specified description for the address.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * A user specified name for the address.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * A Global IP ports grouped by protocol code.
     *
     * @param array<string, mixed> $ports
     */
    public function withPorts(array $ports): self
    {
        $obj = clone $this;
        $obj->ports = $ports;

        return $obj;
    }
}
