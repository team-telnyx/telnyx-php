<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PortingOrdersExceptionType;

/**
 * @phpstan-type porting_order_get_exception_types_response = array{
 *   data?: list<PortingOrdersExceptionType>
 * }
 */
final class PortingOrderGetExceptionTypesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<porting_order_get_exception_types_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PortingOrdersExceptionType>|null $data */
    #[Api(list: PortingOrdersExceptionType::class, optional: true)]
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
     * @param list<PortingOrdersExceptionType> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<PortingOrdersExceptionType> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
