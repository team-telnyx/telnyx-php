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
 * @phpstan-import-type NetworkCreateShape from \Telnyx\Networks\NetworkCreate
 *
 * @phpstan-type NetworkCreateParamsShape = array{
 *   networkCreate: NetworkCreate|NetworkCreateShape
 * }
 */
final class NetworkCreateParams implements BaseModel
{
    /** @use SdkModel<NetworkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public NetworkCreate $networkCreate;

    /**
     * `new NetworkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NetworkCreateParams::with(networkCreate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NetworkCreateParams)->withNetworkCreate(...)
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
     *
     * @param NetworkCreate|NetworkCreateShape $networkCreate
     */
    public static function with(NetworkCreate|array $networkCreate): self
    {
        $self = new self;

        $self['networkCreate'] = $networkCreate;

        return $self;
    }

    /**
     * @param NetworkCreate|NetworkCreateShape $networkCreate
     */
    public function withNetworkCreate(NetworkCreate|array $networkCreate): self
    {
        $self = clone $this;
        $self['networkCreate'] = $networkCreate;

        return $self;
    }
}
