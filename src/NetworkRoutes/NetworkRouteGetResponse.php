<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NetworkRouteShape from \Telnyx\NetworkRoutes\NetworkRoute
 *
 * @phpstan-type NetworkRouteGetResponseShape = array{
 *   data?: null|NetworkRoute|NetworkRouteShape
 * }
 */
final class NetworkRouteGetResponse implements BaseModel
{
    /** @use SdkModel<NetworkRouteGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NetworkRoute $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NetworkRoute|NetworkRouteShape|null $data
     */
    public static function with(NetworkRoute|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NetworkRoute|NetworkRouteShape $data
     */
    public function withData(NetworkRoute|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
