<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrder\Status;

/**
 * @phpstan-type NumberBlockOrderListResponseShape = array{
 *   data?: list<NumberBlockOrder>|null, meta?: PaginationMeta|null
 * }
 */
final class NumberBlockOrderListResponse implements BaseModel
{
    /** @use SdkModel<NumberBlockOrderListResponseShape> */
    use SdkModel;

    /** @var list<NumberBlockOrder>|null $data */
    #[Api(list: NumberBlockOrder::class, optional: true)]
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
     * @param list<NumberBlockOrder|array{
     *   id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers_count?: int|null,
     *   range?: int|null,
     *   record_type?: string|null,
     *   requirements_met?: bool|null,
     *   starting_number?: string|null,
     *   status?: value-of<Status>|null,
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
     * @param list<NumberBlockOrder|array{
     *   id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers_count?: int|null,
     *   range?: int|null,
     *   record_type?: string|null,
     *   requirements_met?: bool|null,
     *   starting_number?: string|null,
     *   status?: value-of<Status>|null,
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
