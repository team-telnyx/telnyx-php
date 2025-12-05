<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SubNumberOrders\SubNumberOrder\PhoneNumberType;
use Telnyx\SubNumberOrders\SubNumberOrder\Status;

/**
 * @phpstan-type SubNumberOrderListResponseShape = array{
 *   data?: list<SubNumberOrder>|null, meta?: PaginationMeta|null
 * }
 */
final class SubNumberOrderListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SubNumberOrderListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<SubNumberOrder>|null $data */
    #[Api(list: SubNumberOrder::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<SubNumberOrder|array{
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   is_block_sub_number_order?: bool|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
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
     * @param list<SubNumberOrder|array{
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   is_block_sub_number_order?: bool|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
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
