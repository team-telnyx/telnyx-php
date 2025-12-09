<?php

declare(strict_types=1);

namespace Telnyx\CallEvents;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\CallEvents\CallEventListResponse\Data;
use Telnyx\CallEvents\CallEventListResponse\Data\RecordType;
use Telnyx\CallEvents\CallEventListResponse\Data\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallEventListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class CallEventListResponse implements BaseModel
{
    /** @use SdkModel<CallEventListResponseShape> */
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
     *   callLegID: string,
     *   callSessionID: string,
     *   eventTimestamp: string,
     *   metadata: mixed,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   type: value-of<Type>,
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
     *   callLegID: string,
     *   callSessionID: string,
     *   eventTimestamp: string,
     *   metadata: mixed,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   type: value-of<Type>,
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
