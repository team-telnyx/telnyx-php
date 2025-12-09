<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data\FieldType;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data\RequirementType;

/**
 * @phpstan-type PortingOrderGetRequirementsResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class PortingOrderGetRequirementsResponse implements BaseModel
{
    /** @use SdkModel<PortingOrderGetRequirementsResponseShape> */
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
     *   fieldType?: value-of<FieldType>|null,
     *   fieldValue?: string|null,
     *   recordType?: string|null,
     *   requirementStatus?: string|null,
     *   requirementType?: RequirementType|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     *   fieldType?: value-of<FieldType>|null,
     *   fieldValue?: string|null,
     *   recordType?: string|null,
     *   requirementStatus?: string|null,
     *   requirementType?: RequirementType|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
