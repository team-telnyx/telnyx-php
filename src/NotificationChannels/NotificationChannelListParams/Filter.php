<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels\NotificationChannelListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\AssociatedRecordType;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\ChannelTypeID;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\NotificationChannel;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\NotificationEventConditionID;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\NotificationProfileID;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq].
 *
 * @phpstan-type FilterShape = array{
 *   associated_record_type?: AssociatedRecordType|null,
 *   channel_type_id?: ChannelTypeID|null,
 *   notification_channel?: NotificationChannel|null,
 *   notification_event_condition_id?: NotificationEventConditionID|null,
 *   notification_profile_id?: NotificationProfileID|null,
 *   status?: Status|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?AssociatedRecordType $associated_record_type;

    #[Api(optional: true)]
    public ?ChannelTypeID $channel_type_id;

    #[Api(optional: true)]
    public ?NotificationChannel $notification_channel;

    #[Api(optional: true)]
    public ?NotificationEventConditionID $notification_event_condition_id;

    #[Api(optional: true)]
    public ?NotificationProfileID $notification_profile_id;

    #[Api(optional: true)]
    public ?Status $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?AssociatedRecordType $associated_record_type = null,
        ?ChannelTypeID $channel_type_id = null,
        ?NotificationChannel $notification_channel = null,
        ?NotificationEventConditionID $notification_event_condition_id = null,
        ?NotificationProfileID $notification_profile_id = null,
        ?Status $status = null,
    ): self {
        $obj = new self;

        null !== $associated_record_type && $obj->associated_record_type = $associated_record_type;
        null !== $channel_type_id && $obj->channel_type_id = $channel_type_id;
        null !== $notification_channel && $obj->notification_channel = $notification_channel;
        null !== $notification_event_condition_id && $obj->notification_event_condition_id = $notification_event_condition_id;
        null !== $notification_profile_id && $obj->notification_profile_id = $notification_profile_id;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withAssociatedRecordType(
        AssociatedRecordType $associatedRecordType
    ): self {
        $obj = clone $this;
        $obj->associated_record_type = $associatedRecordType;

        return $obj;
    }

    public function withChannelTypeID(ChannelTypeID $channelTypeID): self
    {
        $obj = clone $this;
        $obj->channel_type_id = $channelTypeID;

        return $obj;
    }

    public function withNotificationChannel(
        NotificationChannel $notificationChannel
    ): self {
        $obj = clone $this;
        $obj->notification_channel = $notificationChannel;

        return $obj;
    }

    public function withNotificationEventConditionID(
        NotificationEventConditionID $notificationEventConditionID
    ): self {
        $obj = clone $this;
        $obj->notification_event_condition_id = $notificationEventConditionID;

        return $obj;
    }

    public function withNotificationProfileID(
        NotificationProfileID $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj->notification_profile_id = $notificationProfileID;

        return $obj;
    }

    public function withStatus(Status $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
