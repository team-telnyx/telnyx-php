<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RoomUpdateResponseShape = array{data?: Room|null}
 */
final class RoomUpdateResponse implements BaseModel
{
    /** @use SdkModel<RoomUpdateResponseShape> */
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
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
