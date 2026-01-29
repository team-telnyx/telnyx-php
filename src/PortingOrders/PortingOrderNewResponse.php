<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingOrderShape from \Telnyx\PortingOrders\PortingOrder
 *
 * @phpstan-type PortingOrderNewResponseShape = array{
 *   data?: list<PortingOrder|PortingOrderShape>|null
 * }
 */
final class PortingOrderNewResponse implements BaseModel
{
    /** @use SdkModel<PortingOrderNewResponseShape> */
    use SdkModel;

    /** @var list<PortingOrder>|null $data */
    #[Optional(list: PortingOrder::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortingOrder|PortingOrderShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<PortingOrder|PortingOrderShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
