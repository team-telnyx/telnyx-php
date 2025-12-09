<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\AssociatedRecordType;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\ChannelTypeID;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\NotificationChannel;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\NotificationEventConditionID;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\NotificationProfileID;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\Status;
use Telnyx\NotificationChannels\NotificationChannelListParams\Page;

/**
 * List notification channels.
 *
 * @see Telnyx\Services\NotificationChannelsService::list()
 *
 * @phpstan-type NotificationChannelListParamsShape = array{
 *   filter?: Filter|array{
 *     associatedRecordType?: AssociatedRecordType|null,
 *     channelTypeID?: ChannelTypeID|null,
 *     notificationChannel?: \Telnyx\NotificationChannels\NotificationChannelListParams\Filter\NotificationChannel|null,
 *     notificationEventConditionID?: NotificationEventConditionID|null,
 *     notificationProfileID?: NotificationProfileID|null,
 *     status?: Status|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class NotificationChannelListParams implements BaseModel
{
    /** @use SdkModel<NotificationChannelListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   associatedRecordType?: AssociatedRecordType|null,
     *   channelTypeID?: ChannelTypeID|null,
     *   notificationChannel?: NotificationChannel|null,
     *   notificationEventConditionID?: NotificationEventConditionID|null,
     *   notificationProfileID?: NotificationProfileID|null,
     *   status?: Status|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq].
     *
     * @param Filter|array{
     *   associatedRecordType?: AssociatedRecordType|null,
     *   channelTypeID?: ChannelTypeID|null,
     *   notificationChannel?: NotificationChannel|null,
     *   notificationEventConditionID?: NotificationEventConditionID|null,
     *   notificationProfileID?: NotificationProfileID|null,
     *   status?: Status|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
