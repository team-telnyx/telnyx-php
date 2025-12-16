<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannel\ChannelTypeID;

/**
 * A Notification Channel.
 *
 * @phpstan-type NotificationChannelShape = array{
 *   id?: string|null,
 *   channelDestination?: string|null,
 *   channelTypeID?: null|ChannelTypeID|value-of<ChannelTypeID>,
 *   createdAt?: \DateTimeInterface|null,
 *   notificationProfileID?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NotificationChannel implements BaseModel
{
    /** @use SdkModel<NotificationChannelShape> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Optional]
    public ?string $id;

    /**
     * The destination associated with the channel type.
     */
    #[Optional('channel_destination')]
    public ?string $channelDestination;

    /**
     * A Channel Type ID.
     *
     * @var value-of<ChannelTypeID>|null $channelTypeID
     */
    #[Optional('channel_type_id', enum: ChannelTypeID::class)]
    public ?string $channelTypeID;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * A UUID reference to the associated Notification Profile.
     */
    #[Optional('notification_profile_id')]
    public ?string $notificationProfileID;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $channelDestination && $self['channelDestination'] = $channelDestination;
        null !== $channelTypeID && $self['channelTypeID'] = $channelTypeID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $notificationProfileID && $self['notificationProfileID'] = $notificationProfileID;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A UUID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The destination associated with the channel type.
     */
    public function withChannelDestination(string $channelDestination): self
    {
        $self = clone $this;
        $self['channelDestination'] = $channelDestination;

        return $self;
    }

    /**
     * A Channel Type ID.
     *
     * @param ChannelTypeID|value-of<ChannelTypeID> $channelTypeID
     */
    public function withChannelTypeID(ChannelTypeID|string $channelTypeID): self
    {
        $self = clone $this;
        $self['channelTypeID'] = $channelTypeID;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $self = clone $this;
        $self['notificationProfileID'] = $notificationProfileID;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
