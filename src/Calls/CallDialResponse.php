<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Calls\CallDialResponse\Data;
use Telnyx\Calls\CallDialResponse\Data\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallDialResponseShape = array{data?: Data|null}
 */
final class CallDialResponse implements BaseModel
{
    /** @use SdkModel<CallDialResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   is_alive: bool,
     *   record_type: value-of<RecordType>,
     *   call_duration?: int|null,
     *   client_state?: string|null,
     *   end_time?: string|null,
     *   recording_id?: string|null,
     *   start_time?: string|null,
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
     *   is_alive: bool,
     *   record_type: value-of<RecordType>,
     *   call_duration?: int|null,
     *   client_state?: string|null,
     *   end_time?: string|null,
     *   recording_id?: string|null,
     *   start_time?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
