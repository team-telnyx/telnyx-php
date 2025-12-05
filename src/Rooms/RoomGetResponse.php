<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type RoomGetResponseShape = array{data?: Room|null}
 */
final class RoomGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RoomGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Room $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Room|array{
     *   id?: string|null,
     *   active_session_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enable_recording?: bool|null,
     *   max_participants?: int|null,
     *   record_type?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   unique_name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(Room|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Room|array{
     *   id?: string|null,
     *   active_session_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enable_recording?: bool|null,
     *   max_participants?: int|null,
     *   record_type?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   unique_name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(Room|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
