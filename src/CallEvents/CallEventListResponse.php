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
     *   call_leg_id: string,
     *   call_session_id: string,
     *   event_timestamp: string,
     *   metadata: mixed,
     *   name: string,
     *   record_type: value-of<RecordType>,
     *   type: value-of<Type>,
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
     *   call_leg_id: string,
     *   call_session_id: string,
     *   event_timestamp: string,
     *   metadata: mixed,
     *   name: string,
     *   record_type: value-of<RecordType>,
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
