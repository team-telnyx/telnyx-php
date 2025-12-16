<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Actions\ActionConfirmResponse\Meta;
use Telnyx\PortingOrders\PortingOrder;

/**
 * @phpstan-import-type PortingOrderShape from \Telnyx\PortingOrders\PortingOrder
 * @phpstan-import-type MetaShape from \Telnyx\PortingOrders\Actions\ActionConfirmResponse\Meta
 *
 * @phpstan-type ActionConfirmResponseShape = array{
 *   data?: null|PortingOrder|PortingOrderShape, meta?: null|Meta|MetaShape
 * }
 */
final class ActionConfirmResponse implements BaseModel
{
    /** @use SdkModel<ActionConfirmResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingOrder $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderShape $data
     * @param MetaShape $meta
     */
    public static function with(
        PortingOrder|array|null $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param PortingOrderShape $data
     */
    public function withData(PortingOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
