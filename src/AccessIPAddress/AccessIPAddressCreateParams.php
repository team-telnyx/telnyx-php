<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AccessIPAddressCreateParams); // set properties as needed
 * $client->accessIPAddress->create(...$params->toArray());
 * ```
 * Create new Access IP Address.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->accessIPAddress->create(...$params->toArray());`
 *
 * @see Telnyx\AccessIPAddress->create
 *
 * @phpstan-type access_ip_address_create_params = array{
 *   ipAddress: string, description?: string
 * }
 */
final class AccessIPAddressCreateParams implements BaseModel
{
    /** @use SdkModel<access_ip_address_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('ip_address')]
    public string $ipAddress;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * `new AccessIPAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPAddressCreateParams::with(ipAddress: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPAddressCreateParams)->withIPAddress(...)
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
        ?string $description = null
    ): self {
        $obj = new self;

        $obj->ipAddress = $ipAddress;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
