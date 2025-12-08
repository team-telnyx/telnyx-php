<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderListResponse\Data;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse\Data\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse\Data\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse\Data\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdvancedOrderListResponseShape = array{data?: list<Data>|null}
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
     * @param list<Data|array{
     *   id?: string|null,
     *   area_code?: string|null,
     *   comments?: string|null,
     *   country_code?: string|null,
     *   customer_reference?: string|null,
     *   features?: list<value-of<Feature>>|null,
     *   orders?: list<string>|null,
     *   phone_number_type?: list<value-of<PhoneNumberType>>|null,
     *   quantity?: int|null,
     *   requirement_group_id?: string|null,
     *   status?: list<value-of<Status>>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   area_code?: string|null,
     *   comments?: string|null,
     *   country_code?: string|null,
     *   customer_reference?: string|null,
     *   features?: list<value-of<Feature>>|null,
     *   orders?: list<string>|null,
     *   phone_number_type?: list<value-of<PhoneNumberType>>|null,
     *   quantity?: int|null,
     *   requirement_group_id?: string|null,
     *   status?: list<value-of<Status>>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
