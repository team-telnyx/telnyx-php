<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\ChannelTypeID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationChannel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationEventConditionID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\NotificationProfileID;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\Status;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Page;

/**
 * Returns a list of your notifications events conditions.
 *
 * @see Telnyx\Services\NotificationEventConditionsService::list()
 *
 * @phpstan-type NotificationEventConditionListParamsShape = array{
 *   filter?: Filter|array{
 *     associatedRecordType?: AssociatedRecordType|null,
 *     channelTypeID?: ChannelTypeID|null,
 *     notificationChannel?: NotificationChannel|null,
 *     notificationEventConditionID?: NotificationEventConditionID|null,
 *     notificationProfileID?: NotificationProfileID|null,
 *     status?: Status|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class NotificationEventConditionListParams implements BaseModel
{
    /** @use SdkModel<NotificationEventConditionListParamsShape> */
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
