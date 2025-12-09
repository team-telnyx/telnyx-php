<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
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
    #[Optional(list: NumberBlockOrder::class)]
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
     * @param list<NumberBlockOrder|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbersCount?: int|null,
     *   range?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   startingNumber?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     * @param list<NumberBlockOrder|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbersCount?: int|null,
     *   range?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   startingNumber?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
