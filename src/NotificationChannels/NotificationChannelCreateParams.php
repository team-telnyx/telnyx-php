<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannelCreateParams\ChannelTypeID;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new NotificationChannelCreateParams); // set properties as needed
 * $client->notificationChannels->create(...$params->toArray());
 * ```
 * Create a notification channel.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->notificationChannels->create(...$params->toArray());`
 *
 * @see Telnyx\NotificationChannels->create
 *
 * @phpstan-type notification_channel_create_params = array{
 *   channelDestination?: string,
 *   channelTypeID?: ChannelTypeID|value-of<ChannelTypeID>,
 *   notificationProfileID?: string,
 * }
 */
final class NotificationChannelCreateParams implements BaseModel
{
    /** @use SdkModel<notification_channel_create_params> */
    use SdkModel;
    use SdkParams;

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
     * A UUID reference to the associated Notification Profile.
     */
    #[Api('notification_profile_id', optional: true)]
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
        $obj = new self;

        null !== $channelDestination && $obj->channelDestination = $channelDestination;
        null !== $channelTypeID && $obj['channelTypeID'] = $channelTypeID;
        null !== $notificationProfileID && $obj->notificationProfileID = $notificationProfileID;

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
        $obj['channelTypeID'] = $channelTypeID;

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
}
