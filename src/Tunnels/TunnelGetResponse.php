<?php

declare(strict_types=1);

namespace Telnyx\Tunnels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TunnelShape from \Telnyx\Tunnels\Tunnel
 *
 * @phpstan-type TunnelGetResponseShape = array{data?: null|Tunnel|TunnelShape}
 */
final class TunnelGetResponse implements BaseModel
{
    /** @use SdkModel<TunnelGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Tunnel $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Tunnel|TunnelShape|null $data
     */
    public static function with(Tunnel|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Tunnel|TunnelShape $data
     */
    public function withData(Tunnel|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
