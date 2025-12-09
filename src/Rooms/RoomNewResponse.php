<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RoomNewResponseShape = array{data?: Room|null}
 */
final class RoomNewResponse implements BaseModel
{
    /** @use SdkModel<RoomNewResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   activeSessionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enableRecording?: bool|null,
     *   maxParticipants?: int|null,
     *   recordType?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   uniqueName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
     *   activeSessionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enableRecording?: bool|null,
     *   maxParticipants?: int|null,
     *   recordType?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   uniqueName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public function withData(Room|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
