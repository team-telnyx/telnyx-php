<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannel\ChannelTypeID;

/**
 * @phpstan-type NotificationChannelUpdateResponseShape = array{
 *   data?: NotificationChannel|null
 * }
 */
final class NotificationChannelUpdateResponse implements BaseModel
{
    /** @use SdkModel<NotificationChannelUpdateResponseShape> */
    use SdkModel;

    /**
     * A Notification Channel.
     */
    #[Optional]
    public ?NotificationChannel $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NotificationChannel|array{
     *   id?: string|null,
     *   channelDestination?: string|null,
     *   channelTypeID?: value-of<ChannelTypeID>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationProfileID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NotificationChannel|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * A Notification Channel.
     *
     * @param NotificationChannel|array{
     *   id?: string|null,
     *   channelDestination?: string|null,
     *   channelTypeID?: value-of<ChannelTypeID>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationProfileID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NotificationChannel|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
