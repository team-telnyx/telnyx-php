<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannelUpdateParams\ChannelTypeID;

/**
 * Update a notification channel.
 *
 * @see Telnyx\Services\NotificationChannelsService::update()
 *
 * @phpstan-type NotificationChannelUpdateParamsShape = array{
 *   channelDestination?: string|null,
 *   channelTypeID?: null|ChannelTypeID|value-of<ChannelTypeID>,
 *   notificationProfileID?: string|null,
 * }
 */
final class NotificationChannelUpdateParams implements BaseModel
{
    /** @use SdkModel<NotificationChannelUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * A UUID reference to the associated Notification Profile.
     */
    #[Optional('notification_profile_id')]
    public ?string $notificationProfileID;

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
        ?string $channelDestination = null,
        ChannelTypeID|string|null $channelTypeID = null,
        ?string $notificationProfileID = null,
    ): self {
        $self = new self;

        null !== $channelDestination && $self['channelDestination'] = $channelDestination;
        null !== $channelTypeID && $self['channelTypeID'] = $channelTypeID;
        null !== $notificationProfileID && $self['notificationProfileID'] = $notificationProfileID;

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
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $self = clone $this;
        $self['notificationProfileID'] = $notificationProfileID;

        return $self;
    }
}
