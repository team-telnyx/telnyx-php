<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\Calls\CallListResponse\Data;
use Telnyx\Queues\Calls\CallListResponse\Data\RecordType;

/**
 * @phpstan-type CallListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class CallListResponse implements BaseModel
{
    /** @use SdkModel<CallListResponseShape> */
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
     *   call_control_id: string,
     *   call_leg_id: string,
     *   call_session_id: string,
     *   connection_id: string,
     *   enqueued_at: string,
     *   from: string,
     *   queue_id: string,
     *   queue_position: int,
     *   record_type: value-of<RecordType>,
     *   to: string,
     *   wait_time_secs: int,
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
     *   call_control_id: string,
     *   call_leg_id: string,
     *   call_session_id: string,
     *   connection_id: string,
     *   enqueued_at: string,
     *   from: string,
     *   queue_id: string,
     *   queue_position: int,
     *   record_type: value-of<RecordType>,
     *   to: string,
     *   wait_time_secs: int,
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
