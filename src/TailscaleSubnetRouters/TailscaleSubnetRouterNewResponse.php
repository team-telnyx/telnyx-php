<?php

declare(strict_types=1);

namespace Telnyx\TailscaleSubnetRouters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TailscaleSubnetRouterShape from \Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter
 *
 * @phpstan-type TailscaleSubnetRouterNewResponseShape = array{
 *   data?: null|TailscaleSubnetRouter|TailscaleSubnetRouterShape
 * }
 */
final class TailscaleSubnetRouterNewResponse implements BaseModel
{
    /** @use SdkModel<TailscaleSubnetRouterNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?TailscaleSubnetRouter $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TailscaleSubnetRouter|TailscaleSubnetRouterShape|null $data
     */
    public static function with(TailscaleSubnetRouter|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param TailscaleSubnetRouter|TailscaleSubnetRouterShape $data
     */
    public function withData(TailscaleSubnetRouter|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
