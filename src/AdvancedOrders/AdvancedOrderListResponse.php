<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderListResponse\Data;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AdvancedOrders\AdvancedOrderListResponse\Data
 *
 * @phpstan-type AdvancedOrderListResponseShape = array{
 *   data?: list<Data|DataShape>|null
 * }
 */
final class AdvancedOrderListResponse implements BaseModel
{
    /** @use SdkModel<AdvancedOrderListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|DataShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
