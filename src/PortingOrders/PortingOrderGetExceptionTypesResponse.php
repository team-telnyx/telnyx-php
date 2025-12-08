<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrdersExceptionType;
use Telnyx\PortingOrdersExceptionType\Code;

/**
 * @phpstan-type PortingOrderGetExceptionTypesResponseShape = array{
 *   data?: list<PortingOrdersExceptionType>|null
 * }
 */
final class PortingOrderGetExceptionTypesResponse implements BaseModel
{
    /** @use SdkModel<PortingOrderGetExceptionTypesResponseShape> */
    use SdkModel;

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
     * @param list<PortingOrdersExceptionType|array{
     *   code?: value-of<Code>|null, description?: string|null
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<PortingOrdersExceptionType|array{
     *   code?: value-of<Code>|null, description?: string|null
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
