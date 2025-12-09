<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomComposition\Format;
use Telnyx\RoomCompositions\RoomComposition\Status;

/**
 * @phpstan-type RoomCompositionNewResponseShape = array{
 *   data?: RoomComposition|null
 * }
 */
final class RoomCompositionNewResponse implements BaseModel
{
    /** @use SdkModel<RoomCompositionNewResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   completedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   downloadURL?: string|null,
     *   durationSecs?: int|null,
     *   endedAt?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
     *   sessionID?: string|null,
     *   sizeMB?: float|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   videoLayout?: array<string,VideoRegion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
     *   completedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   downloadURL?: string|null,
     *   durationSecs?: int|null,
     *   endedAt?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
     *   sessionID?: string|null,
     *   sizeMB?: float|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   videoLayout?: array<string,VideoRegion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public function withData(RoomComposition|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
