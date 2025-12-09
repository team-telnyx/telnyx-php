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
        $self = new self;

        null !== $associatedRecordType && $self['associatedRecordType'] = $associatedRecordType;
        null !== $channelTypeID && $self['channelTypeID'] = $channelTypeID;
        null !== $notificationChannel && $self['notificationChannel'] = $notificationChannel;
        null !== $notificationEventConditionID && $self['notificationEventConditionID'] = $notificationEventConditionID;
        null !== $notificationProfileID && $self['notificationProfileID'] = $notificationProfileID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * @param AssociatedRecordType|array{eq?: value-of<Eq>|null} $associatedRecordType
     */
    public function withAssociatedRecordType(
        AssociatedRecordType|array $associatedRecordType
    ): self {
        $self = clone $this;
        $self['associatedRecordType'] = $associatedRecordType;

        return $self;
    }

    /**
     * @param ChannelTypeID|array{
     *   eq?: value-of<ChannelTypeID\Eq>|null,
     * } $channelTypeID
     */
    public function withChannelTypeID(ChannelTypeID|array $channelTypeID): self
    {
        $self = clone $this;
        $self['channelTypeID'] = $channelTypeID;

        return $self;
    }

    /**
     * @param NotificationChannel|array{eq?: string|null} $notificationChannel
     */
    public function withNotificationChannel(
        NotificationChannel|array $notificationChannel
    ): self {
        $self = clone $this;
        $self['notificationChannel'] = $notificationChannel;

        return $self;
    }

    /**
     * @param NotificationEventConditionID|array{
     *   eq?: string|null
     * } $notificationEventConditionID
     */
    public function withNotificationEventConditionID(
        NotificationEventConditionID|array $notificationEventConditionID
    ): self {
        $self = clone $this;
        $self['notificationEventConditionID'] = $notificationEventConditionID;

        return $self;
    }

    /**
     * @param NotificationProfileID|array{eq?: string|null} $notificationProfileID
     */
    public function withNotificationProfileID(
        NotificationProfileID|array $notificationProfileID
    ): self {
        $self = clone $this;
        $self['notificationProfileID'] = $notificationProfileID;

        return $self;
    }

    /**
     * @param Status|array{
     *   eq?: value-of<Status\Eq>|null,
     * } $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
