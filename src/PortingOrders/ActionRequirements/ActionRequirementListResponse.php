<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse\Data;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse\Data\RecordType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse\Data\Status;

/**
 * @phpstan-type ActionRequirementListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class ActionRequirementListResponse implements BaseModel
{
    /** @use SdkModel<ActionRequirementListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   action_type?: string|null,
     *   action_url?: string|null,
     *   cancel_reason?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   porting_order_id?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   requirement_type_id?: string|null,
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
     * @param list<Data|array{
     *   id?: string|null,
     *   action_type?: string|null,
     *   action_url?: string|null,
     *   cancel_reason?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   porting_order_id?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   requirement_type_id?: string|null,
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
