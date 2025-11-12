<?php

declare(strict_types=1);

namespace Telnyx\Networks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a Network.
 *
 * @see Telnyx\NetworksService::update()
 *
 * @phpstan-type NetworkUpdateParamsShape = array{name: string}
 */
final class NetworkUpdateParams implements BaseModel
{
    /** @use SdkModel<NetworkUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user specified name for the network.
     */
    #[Api]
    public string $name;

    /**
     * `new NetworkUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NetworkUpdateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NetworkUpdateParams)->withName(...)
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
    public static function with(string $name): self
    {
        $obj = new self;

        $obj->name = $name;

        return $obj;
    }

    /**
     * A user specified name for the network.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
