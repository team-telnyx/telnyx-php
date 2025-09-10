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
 * @phpstan-type notification_channel = array{
 *   id?: string|null,
 *   channelDestination?: string|null,
 *   channelTypeID?: value-of<ChannelTypeID>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   notificationProfileID?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NotificationChannel implements BaseModel
{
    /** @use SdkModel<notification_channel> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The destination associated with the channel type.
     */
    #[Api('channel_destination', optional: true)]
    public ?string $channelDestination;

    /**
     * A Channel Type ID.
     *
     * @var value-of<ChannelTypeID>|null $channelTypeID
     */
    #[Api('channel_type_id', enum: ChannelTypeID::class, optional: true)]
    public ?string $channelTypeID;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * A UUID reference to the associated Notification Profile.
     */
    #[Api('notification_profile_id', optional: true)]
    public ?string $notificationProfileID;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ChannelTypeID|value-of<ChannelTypeID> $channelTypeID
     */
    public static function with(
        ?string $id = null,
        ?string $channelDestination = null,
        ChannelTypeID|string|null $channelTypeID = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $notificationProfileID = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $channelDestination && $obj->channelDestination = $channelDestination;
        null !== $channelTypeID && $obj->channelTypeID = $channelTypeID instanceof ChannelTypeID ? $channelTypeID->value : $channelTypeID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $notificationProfileID && $obj->notificationProfileID = $notificationProfileID;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->channelDestination = $channelDestination;

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
        $obj->channelTypeID = $channelTypeID instanceof ChannelTypeID ? $channelTypeID->value : $channelTypeID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj->notificationProfileID = $notificationProfileID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
