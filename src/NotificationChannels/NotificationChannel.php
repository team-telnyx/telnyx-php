<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannel\ChannelTypeID;

/**
 * A Notification Channel.
 *
 * @phpstan-type NotificationChannelShape = array{
 *   id?: string|null,
 *   channel_destination?: string|null,
 *   channel_type_id?: value-of<ChannelTypeID>|null,
 *   created_at?: \DateTimeInterface|null,
 *   notification_profile_id?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class NotificationChannel implements BaseModel
{
    /** @use SdkModel<NotificationChannelShape> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The destination associated with the channel type.
     */
    #[Api(optional: true)]
    public ?string $channel_destination;

    /**
     * A Channel Type ID.
     *
     * @var value-of<ChannelTypeID>|null $channel_type_id
     */
    #[Api(enum: ChannelTypeID::class, optional: true)]
    public ?string $channel_type_id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * A UUID reference to the associated Notification Profile.
     */
    #[Api(optional: true)]
    public ?string $notification_profile_id;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ChannelTypeID|value-of<ChannelTypeID> $channel_type_id
     */
    public static function with(
        ?string $id = null,
        ?string $channel_destination = null,
        ChannelTypeID|string|null $channel_type_id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $notification_profile_id = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $channel_destination && $obj->channel_destination = $channel_destination;
        null !== $channel_type_id && $obj['channel_type_id'] = $channel_type_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $notification_profile_id && $obj->notification_profile_id = $notification_profile_id;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * A UUID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The destination associated with the channel type.
     */
    public function withChannelDestination(string $channelDestination): self
    {
        $obj = clone $this;
        $obj->channel_destination = $channelDestination;

        return $obj;
    }

    /**
     * A Channel Type ID.
     *
     * @param ChannelTypeID|value-of<ChannelTypeID> $channelTypeID
     */
    public function withChannelTypeID(ChannelTypeID|string $channelTypeID): self
    {
        $obj = clone $this;
        $obj['channel_type_id'] = $channelTypeID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj->notification_profile_id = $notificationProfileID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
