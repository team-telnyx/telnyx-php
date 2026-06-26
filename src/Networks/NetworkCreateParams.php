<?php

declare(strict_types=1);

namespace Telnyx\Networks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new Network.
 *
 * @see Telnyx\Services\NetworksService::create()
 *
 * @phpstan-type NetworkCreateParamsShape = array{name: string}
 */
final class NetworkCreateParams implements BaseModel
{
    /** @use SdkModel<NetworkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user specified name for the network.
     */
    #[Required]
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
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * A user specified name for the network.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
