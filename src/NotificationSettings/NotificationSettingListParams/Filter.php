<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings\NotificationSettingListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\AssociatedRecordType;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\ChannelTypeID;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\NotificationChannel;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\NotificationEventConditionID;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\NotificationProfileID;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\Status;

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

    #[Optional]
    public ?AssociatedRecordType $associated_record_type;

    #[Optional]
    public ?ChannelTypeID $channel_type_id;

    #[Optional]
    public ?NotificationChannel $notification_channel;

    #[Optional]
    public ?NotificationEventConditionID $notification_event_condition_id;

    #[Optional]
    public ?NotificationProfileID $notification_profile_id;

    #[Optional]
    public ?Status $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AssociatedRecordType|array{
     *   eq?: value-of<Eq>|null
     * } $associated_record_type
     * @param ChannelTypeID|array{
     *   eq?: value-of<ChannelTypeID\Eq>|null,
     * } $channel_type_id
     * @param NotificationChannel|array{eq?: string|null} $notification_channel
     * @param NotificationEventConditionID|array{
     *   eq?: string|null
     * } $notification_event_condition_id
     * @param NotificationProfileID|array{eq?: string|null} $notification_profile_id
     * @param Status|array{
     *   eq?: value-of<Status\Eq>|null,
     * } $status
     */
    public static function with(
        AssociatedRecordType|array|null $associated_record_type = null,
        ChannelTypeID|array|null $channel_type_id = null,
        NotificationChannel|array|null $notification_channel = null,
        NotificationEventConditionID|array|null $notification_event_condition_id = null,
        NotificationProfileID|array|null $notification_profile_id = null,
        Status|array|null $status = null,
    ): self {
        $obj = new self;

        null !== $associated_record_type && $obj['associated_record_type'] = $associated_record_type;
        null !== $channel_type_id && $obj['channel_type_id'] = $channel_type_id;
        null !== $notification_channel && $obj['notification_channel'] = $notification_channel;
        null !== $notification_event_condition_id && $obj['notification_event_condition_id'] = $notification_event_condition_id;
        null !== $notification_profile_id && $obj['notification_profile_id'] = $notification_profile_id;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param AssociatedRecordType|array{eq?: value-of<Eq>|null} $associatedRecordType
     */
    public function withAssociatedRecordType(
        AssociatedRecordType|array $associatedRecordType
    ): self {
        $obj = clone $this;
        $obj['associated_record_type'] = $associatedRecordType;

        return $obj;
    }

    /**
     * @param ChannelTypeID|array{
     *   eq?: value-of<ChannelTypeID\Eq>|null,
     * } $channelTypeID
     */
    public function withChannelTypeID(ChannelTypeID|array $channelTypeID): self
    {
        $obj = clone $this;
        $obj['channel_type_id'] = $channelTypeID;

        return $obj;
    }

    /**
     * @param NotificationChannel|array{eq?: string|null} $notificationChannel
     */
    public function withNotificationChannel(
        NotificationChannel|array $notificationChannel
    ): self {
        $obj = clone $this;
        $obj['notification_channel'] = $notificationChannel;

        return $obj;
    }

    /**
     * @param NotificationEventConditionID|array{
     *   eq?: string|null
     * } $notificationEventConditionID
     */
    public function withNotificationEventConditionID(
        NotificationEventConditionID|array $notificationEventConditionID
    ): self {
        $obj = clone $this;
        $obj['notification_event_condition_id'] = $notificationEventConditionID;

        return $obj;
    }

    /**
     * @param NotificationProfileID|array{eq?: string|null} $notificationProfileID
     */
    public function withNotificationProfileID(
        NotificationProfileID|array $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj['notification_profile_id'] = $notificationProfileID;

        return $obj;
    }

    /**
     * @param Status|array{
     *   eq?: value-of<Status\Eq>|null,
     * } $status
     */
    public function withStatus(Status|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
