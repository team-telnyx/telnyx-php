<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListParams;

use Telnyx\Core\Attributes\Optional;
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
 * @phpstan-import-type AssociatedRecordTypeShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType
 * @phpstan-import-type ChannelTypeIDShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\ChannelTypeID
 * @phpstan-import-type NotificationChannelShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationChannel
 * @phpstan-import-type NotificationEventConditionIDShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationEventConditionID
 * @phpstan-import-type NotificationProfileIDShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationProfileID
 * @phpstan-import-type StatusShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\Status
 *
 * @phpstan-type FilterShape = array{
 *   associatedRecordType?: null|AssociatedRecordType|AssociatedRecordTypeShape,
 *   channelTypeID?: null|ChannelTypeID|ChannelTypeIDShape,
 *   notificationChannel?: null|NotificationChannel|NotificationChannelShape,
 *   notificationEventConditionID?: null|NotificationEventConditionID|NotificationEventConditionIDShape,
 *   notificationProfileID?: null|NotificationProfileID|NotificationProfileIDShape,
 *   status?: null|Status|StatusShape,
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
     * @param AssociatedRecordTypeShape $associatedRecordType
     * @param ChannelTypeIDShape $channelTypeID
     * @param NotificationChannelShape $notificationChannel
     * @param NotificationEventConditionIDShape $notificationEventConditionID
     * @param NotificationProfileIDShape $notificationProfileID
     * @param StatusShape $status
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
     * @param AssociatedRecordTypeShape $associatedRecordType
     */
    public function withAssociatedRecordType(
        AssociatedRecordType|array $associatedRecordType
    ): self {
        $self = clone $this;
        $self['associatedRecordType'] = $associatedRecordType;

        return $self;
    }

    /**
     * @param ChannelTypeIDShape $channelTypeID
     */
    public function withChannelTypeID(ChannelTypeID|array $channelTypeID): self
    {
        $self = clone $this;
        $self['channelTypeID'] = $channelTypeID;

        return $self;
    }

    /**
     * @param NotificationChannelShape $notificationChannel
     */
    public function withNotificationChannel(
        NotificationChannel|array $notificationChannel
    ): self {
        $self = clone $this;
        $self['notificationChannel'] = $notificationChannel;

        return $self;
    }

    /**
     * @param NotificationEventConditionIDShape $notificationEventConditionID
     */
    public function withNotificationEventConditionID(
        NotificationEventConditionID|array $notificationEventConditionID
    ): self {
        $self = clone $this;
        $self['notificationEventConditionID'] = $notificationEventConditionID;

        return $self;
    }

    /**
     * @param NotificationProfileIDShape $notificationProfileID
     */
    public function withNotificationProfileID(
        NotificationProfileID|array $notificationProfileID
    ): self {
        $self = clone $this;
        $self['notificationProfileID'] = $notificationProfileID;

        return $self;
    }

    /**
     * @param StatusShape $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
