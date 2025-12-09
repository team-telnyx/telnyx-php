<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\ChannelTypeID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationChannel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationEventConditionID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationProfileID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq].
 *
 * @phpstan-type FilterShape = array{
 *   associatedRecordType?: AssociatedRecordType|null,
 *   channelTypeID?: ChannelTypeID|null,
 *   notificationChannel?: NotificationChannel|null,
 *   notificationEventConditionID?: NotificationEventConditionID|null,
 *   notificationProfileID?: NotificationProfileID|null,
 *   status?: Status|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('associated_record_type')]
    public ?AssociatedRecordType $associatedRecordType;

    #[Optional('channel_type_id')]
    public ?ChannelTypeID $channelTypeID;

    #[Optional('notification_channel')]
    public ?NotificationChannel $notificationChannel;

    #[Optional('notification_event_condition_id')]
    public ?NotificationEventConditionID $notificationEventConditionID;

    #[Optional('notification_profile_id')]
    public ?NotificationProfileID $notificationProfileID;

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
     * @param AssociatedRecordType|array{eq?: value-of<Eq>|null} $associatedRecordType
     * @param ChannelTypeID|array{
     *   eq?: value-of<ChannelTypeID\Eq>|null,
     * } $channelTypeID
     * @param NotificationChannel|array{eq?: string|null} $notificationChannel
     * @param NotificationEventConditionID|array{
     *   eq?: string|null
     * } $notificationEventConditionID
     * @param NotificationProfileID|array{eq?: string|null} $notificationProfileID
     * @param Status|array{
     *   eq?: value-of<Status\Eq>|null,
     * } $status
     */
    public static function with(
        AssociatedRecordType|array|null $associatedRecordType = null,
        ChannelTypeID|array|null $channelTypeID = null,
        NotificationChannel|array|null $notificationChannel = null,
        NotificationEventConditionID|array|null $notificationEventConditionID = null,
        NotificationProfileID|array|null $notificationProfileID = null,
        Status|array|null $status = null,
    ): self {
        $obj = new self;

        null !== $associatedRecordType && $obj['associatedRecordType'] = $associatedRecordType;
        null !== $channelTypeID && $obj['channelTypeID'] = $channelTypeID;
        null !== $notificationChannel && $obj['notificationChannel'] = $notificationChannel;
        null !== $notificationEventConditionID && $obj['notificationEventConditionID'] = $notificationEventConditionID;
        null !== $notificationProfileID && $obj['notificationProfileID'] = $notificationProfileID;
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
        $obj['associatedRecordType'] = $associatedRecordType;

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
        $obj['channelTypeID'] = $channelTypeID;

        return $obj;
    }

    /**
     * @param NotificationChannel|array{eq?: string|null} $notificationChannel
     */
    public function withNotificationChannel(
        NotificationChannel|array $notificationChannel
    ): self {
        $obj = clone $this;
        $obj['notificationChannel'] = $notificationChannel;

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
        $obj['notificationEventConditionID'] = $notificationEventConditionID;

        return $obj;
    }

    /**
     * @param NotificationProfileID|array{eq?: string|null} $notificationProfileID
     */
    public function withNotificationProfileID(
        NotificationProfileID|array $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj['notificationProfileID'] = $notificationProfileID;

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
