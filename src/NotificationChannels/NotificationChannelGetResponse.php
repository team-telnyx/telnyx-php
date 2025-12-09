<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannel\ChannelTypeID;

/**
 * @phpstan-type NotificationChannelGetResponseShape = array{
 *   data?: NotificationChannel|null
 * }
 */
final class NotificationChannelGetResponse implements BaseModel
{
    /** @use SdkModel<NotificationChannelGetResponseShape> */
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
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
