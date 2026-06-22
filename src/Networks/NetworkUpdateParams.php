<?php

declare(strict_types=1);

namespace Telnyx\Networks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a Network.
 *
 * @see Telnyx\Services\NetworksService::update()
 *
 * @phpstan-import-type NetworkCreateShape from \Telnyx\Networks\NetworkCreate
 *
 * @phpstan-type NetworkUpdateParamsShape = array{
 *   networkCreate: NetworkCreate|NetworkCreateShape
 * }
 */
final class NetworkUpdateParams implements BaseModel
{
    /** @use SdkModel<NetworkUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public NetworkCreate $networkCreate;

    /**
     * `new NetworkUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NetworkUpdateParams::with(networkCreate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NetworkUpdateParams)->withNetworkCreate(...)
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
