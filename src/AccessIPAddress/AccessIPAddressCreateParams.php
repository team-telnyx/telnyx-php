<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create new Access IP Address.
 *
 * @see Telnyx\Services\AccessIPAddressService::create()
 *
 * @phpstan-type AccessIPAddressCreateParamsShape = array{
 *   ip_address: string, description?: string
 * }
 */
final class AccessIPAddressCreateParams implements BaseModel
{
    /** @use SdkModel<AccessIPAddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $ip_address;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * `new AccessIPAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPAddressCreateParams::with(ip_address: ...)
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
        string $ip_address,
        ?string $description = null
    ): self {
        $obj = new self;

        $obj->ip_address = $ip_address;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ip_address = $ipAddress;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
