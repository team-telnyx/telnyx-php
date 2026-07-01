<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdvancedOrderShape from \Telnyx\AdvancedOrders\AdvancedOrder
 *
 * @phpstan-type AdvancedOrderListResponseShape = array{
 *   data?: list<AdvancedOrder|AdvancedOrderShape>|null
 * }
 */
final class AdvancedOrderListResponse implements BaseModel
{
    /** @use SdkModel<AdvancedOrderListResponseShape> */
    use SdkModel;

    /** @var list<AdvancedOrder>|null $data */
    #[Optional(list: AdvancedOrder::class)]
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
     * @param list<AdvancedOrder|AdvancedOrderShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AdvancedOrder|AdvancedOrderShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
