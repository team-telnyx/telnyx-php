<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse\Data;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse\Data\OrderingGroup;

/**
 * @phpstan-type InexplicitNumberOrderNewResponseShape = array{data?: Data|null}
 */
final class InexplicitNumberOrderNewResponse implements BaseModel
{
    /** @use SdkModel<InexplicitNumberOrderNewResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   ordering_groups?: list<OrderingGroup>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   ordering_groups?: list<OrderingGroup>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
