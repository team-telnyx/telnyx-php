<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-type RoomParticipantGetResponseShape = array{
 *   data?: RoomParticipant|null
 * }
 */
final class RoomParticipantGetResponse implements BaseModel
{
    /** @use SdkModel<RoomParticipantGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RoomParticipant $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RoomParticipant|array{
     *   id?: string|null,
     *   context?: string|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   sessionID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(RoomParticipant|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param RoomParticipant|array{
     *   id?: string|null,
     *   context?: string|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   sessionID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(RoomParticipant|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
