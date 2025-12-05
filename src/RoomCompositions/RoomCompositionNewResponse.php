<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\RoomCompositions\RoomComposition\Format;
use Telnyx\RoomCompositions\RoomComposition\Status;

/**
 * @phpstan-type RoomCompositionNewResponseShape = array{
 *   data?: RoomComposition|null
 * }
 */
final class RoomCompositionNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RoomCompositionNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?RoomComposition $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RoomComposition|array{
     *   id?: string|null,
     *   completed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_url?: string|null,
     *   duration_secs?: int|null,
     *   ended_at?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   size_mb?: float|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   video_layout?: array<string,VideoRegion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(RoomComposition|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param RoomComposition|array{
     *   id?: string|null,
     *   completed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_url?: string|null,
     *   duration_secs?: int|null,
     *   ended_at?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   size_mb?: float|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   video_layout?: array<string,VideoRegion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(RoomComposition|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
