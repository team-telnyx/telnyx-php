<?php

declare(strict_types=1);

namespace Telnyx\Tunnels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TunnelWithTokenShape from \Telnyx\Tunnels\TunnelWithToken
 *
 * @phpstan-type TunnelNewResponseShape = array{
 *   data?: null|TunnelWithToken|TunnelWithTokenShape
 * }
 */
final class TunnelNewResponse implements BaseModel
{
    /** @use SdkModel<TunnelNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?TunnelWithToken $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TunnelWithToken|TunnelWithTokenShape|null $data
     */
    public static function with(TunnelWithToken|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param TunnelWithToken|TunnelWithTokenShape $data
     */
    public function withData(TunnelWithToken|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
