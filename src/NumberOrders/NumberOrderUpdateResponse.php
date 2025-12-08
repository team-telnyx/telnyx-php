<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers\Status;

/**
 * @phpstan-type NumberOrderUpdateResponseShape = array{
 *   data?: NumberOrderWithPhoneNumbers|null
 * }
 */
final class NumberOrderUpdateResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderUpdateResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?NumberOrderWithPhoneNumbers $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberOrderWithPhoneNumbers|array{
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers?: list<PhoneNumber>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   requirements_met?: bool|null,
     *   status?: value-of<Status>|null,
     *   sub_number_orders_ids?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        NumberOrderWithPhoneNumbers|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param NumberOrderWithPhoneNumbers|array{
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers?: list<PhoneNumber>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   requirements_met?: bool|null,
     *   status?: value-of<Status>|null,
     *   sub_number_orders_ids?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NumberOrderWithPhoneNumbers|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
