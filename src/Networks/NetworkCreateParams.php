<?php

declare(strict_types=1);

namespace Telnyx\Networks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new Network.
 *
 * @see Telnyx\Networks->create
 *
 * @phpstan-type network_create_params = array{name: string}
 */
final class NetworkCreateParams implements BaseModel
{
    /** @use SdkModel<network_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A user specified name for the network.
     */
    #[Api]
    public string $name;

    /**
     * `new NetworkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NetworkCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NetworkCreateParams)->withName(...)
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
