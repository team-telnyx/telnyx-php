<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Api;
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
 *   channel_destination?: string,
 *   channel_type_id?: ChannelTypeID|value-of<ChannelTypeID>,
 *   notification_profile_id?: string,
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
     * A UUID reference to the associated Notification Profile.
     */
    #[Api(optional: true)]
    public ?string $notification_profile_id;

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
        ?string $channel_destination = null,
        ChannelTypeID|string|null $channel_type_id = null,
        ?string $notification_profile_id = null,
    ): self {
        $obj = new self;

        null !== $channel_destination && $obj['channel_destination'] = $channel_destination;
        null !== $channel_type_id && $obj['channel_type_id'] = $channel_type_id;
        null !== $notification_profile_id && $obj['notification_profile_id'] = $notification_profile_id;

        return $obj;
    }

    /**
     * The destination associated with the channel type.
     */
    public function withChannelDestination(string $channelDestination): self
    {
        $obj = clone $this;
        $obj['channel_destination'] = $channelDestination;

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
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj['notification_profile_id'] = $notificationProfileID;

        return $obj;
    }
}
