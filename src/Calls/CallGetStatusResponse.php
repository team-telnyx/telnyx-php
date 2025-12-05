<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Calls\CallGetStatusResponse\Data;
use Telnyx\Calls\CallGetStatusResponse\Data\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CallGetStatusResponseShape = array{data?: Data|null}
 */
final class CallGetStatusResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CallGetStatusResponseShape> */
    use SdkModel;

    use SdkResponse;

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
