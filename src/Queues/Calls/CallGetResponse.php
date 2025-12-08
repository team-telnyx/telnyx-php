<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\Calls\CallGetResponse\Data;
use Telnyx\Queues\Calls\CallGetResponse\Data\RecordType;

/**
 * @phpstan-type CallGetResponseShape = array{data?: Data|null}
 */
final class CallGetResponse implements BaseModel
{
    /** @use SdkModel<CallGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
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
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
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
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
