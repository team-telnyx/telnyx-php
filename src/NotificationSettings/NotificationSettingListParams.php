<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\AssociatedRecordType;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\ChannelTypeID;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\NotificationChannel;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\NotificationEventConditionID;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\NotificationProfileID;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\Status;
use Telnyx\NotificationSettings\NotificationSettingListParams\Page;

/**
 * List notification settings.
 *
 * @see Telnyx\Services\NotificationSettingsService::list()
 *
 * @phpstan-type NotificationSettingListParamsShape = array{
 *   filter?: Filter|array{
 *     associated_record_type?: AssociatedRecordType|null,
 *     channel_type_id?: ChannelTypeID|null,
 *     notification_channel?: NotificationChannel|null,
 *     notification_event_condition_id?: NotificationEventConditionID|null,
 *     notification_profile_id?: NotificationProfileID|null,
 *     status?: Status|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class NotificationSettingListParams implements BaseModel
{
    /** @use SdkModel<NotificationSettingListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
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
     *   associated_record_type?: AssociatedRecordType|null,
     *   channel_type_id?: ChannelTypeID|null,
     *   notification_channel?: NotificationChannel|null,
     *   notification_event_condition_id?: NotificationEventConditionID|null,
     *   notification_profile_id?: NotificationProfileID|null,
     *   status?: Status|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq].
     *
     * @param Filter|array{
     *   associated_record_type?: AssociatedRecordType|null,
     *   channel_type_id?: ChannelTypeID|null,
     *   notification_channel?: NotificationChannel|null,
     *   notification_event_condition_id?: NotificationEventConditionID|null,
     *   notification_profile_id?: NotificationProfileID|null,
     *   status?: Status|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
