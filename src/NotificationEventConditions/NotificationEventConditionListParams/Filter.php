<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\ChannelTypeID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationChannel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationEventConditionID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationProfileID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq].
 *
 * @phpstan-type filter_alias = array{
 *   associatedRecordType?: AssociatedRecordType,
 *   channelTypeID?: ChannelTypeID,
 *   notificationChannel?: NotificationChannel,
 *   notificationEventConditionID?: NotificationEventConditionID,
 *   notificationProfileID?: NotificationProfileID,
 *   status?: Status,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api('associated_record_type', optional: true)]
    public ?AssociatedRecordType $associatedRecordType;

    #[Api('channel_type_id', optional: true)]
    public ?ChannelTypeID $channelTypeID;

    #[Api('notification_channel', optional: true)]
    public ?NotificationChannel $notificationChannel;

    #[Api('notification_event_condition_id', optional: true)]
    public ?NotificationEventConditionID $notificationEventConditionID;

    #[Api('notification_profile_id', optional: true)]
    public ?NotificationProfileID $notificationProfileID;

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
        ?AssociatedRecordType $associatedRecordType = null,
        ?ChannelTypeID $channelTypeID = null,
        ?NotificationChannel $notificationChannel = null,
        ?NotificationEventConditionID $notificationEventConditionID = null,
        ?NotificationProfileID $notificationProfileID = null,
        ?Status $status = null,
    ): self {
        $obj = new self;

        null !== $associatedRecordType && $obj->associatedRecordType = $associatedRecordType;
        null !== $channelTypeID && $obj->channelTypeID = $channelTypeID;
        null !== $notificationChannel && $obj->notificationChannel = $notificationChannel;
        null !== $notificationEventConditionID && $obj->notificationEventConditionID = $notificationEventConditionID;
        null !== $notificationProfileID && $obj->notificationProfileID = $notificationProfileID;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withAssociatedRecordType(
        AssociatedRecordType $associatedRecordType
    ): self {
        $obj = clone $this;
        $obj->associatedRecordType = $associatedRecordType;

        return $obj;
    }

    public function withChannelTypeID(ChannelTypeID $channelTypeID): self
    {
        $obj = clone $this;
        $obj->channelTypeID = $channelTypeID;

        return $obj;
    }

    public function withNotificationChannel(
        NotificationChannel $notificationChannel
    ): self {
        $obj = clone $this;
        $obj->notificationChannel = $notificationChannel;

        return $obj;
    }

    public function withNotificationEventConditionID(
        NotificationEventConditionID $notificationEventConditionID
    ): self {
        $obj = clone $this;
        $obj->notificationEventConditionID = $notificationEventConditionID;

        return $obj;
    }

    public function withNotificationProfileID(
        NotificationProfileID $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj->notificationProfileID = $notificationProfileID;

        return $obj;
    }

    public function withStatus(Status $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
