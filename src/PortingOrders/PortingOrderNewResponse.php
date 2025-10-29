<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type PortingOrderNewResponseShape = array{data?: list<PortingOrder>}
 */
final class PortingOrderNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PortingOrderNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PortingOrder>|null $data */
    #[Api(list: PortingOrder::class, optional: true)]
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
     * @param list<PortingOrder> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<PortingOrder> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
