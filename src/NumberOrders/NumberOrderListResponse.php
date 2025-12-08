<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderListResponse\Data;
use Telnyx\NumberOrders\NumberOrderListResponse\Data\PhoneNumber;
use Telnyx\NumberOrders\NumberOrderListResponse\Data\Status;

/**
 * @phpstan-type NumberOrderListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class NumberOrderListResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

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
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
