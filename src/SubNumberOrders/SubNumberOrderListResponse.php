<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumbersSubNumberOrderShape from \Telnyx\SubNumberOrders\NumbersSubNumberOrder
 * @phpstan-import-type PaginationMetaShape from \Telnyx\AuthenticationProviders\PaginationMeta
 *
 * @phpstan-type SubNumberOrderListResponseShape = array{
 *   data?: list<NumbersSubNumberOrder|NumbersSubNumberOrderShape>|null,
 *   meta?: null|PaginationMeta|PaginationMetaShape,
 * }
 */
final class SubNumberOrderListResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrderListResponseShape> */
    use SdkModel;

    /** @var list<NumbersSubNumberOrder>|null $data */
    #[Optional(list: NumbersSubNumberOrder::class)]
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
     * @param list<NumbersSubNumberOrder|NumbersSubNumberOrderShape>|null $data
     * @param PaginationMeta|PaginationMetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<NumbersSubNumberOrder|NumbersSubNumberOrderShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|PaginationMetaShape $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
