<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationSettings\NotificationSetting;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;

interface NotificationSettingsContract
{
    /**
     * @api
     *
     * @param string $notificationChannelID a UUID reference to the associated Notification Channel
     * @param string $notificationEventConditionID a UUID reference to the associated Notification Event Condition
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     * @param list<array{name?: string, value?: string}> $parameters
     *
     * @throws APIException
     */
    public function create(
        ?string $notificationChannelID = null,
        ?string $notificationEventConditionID = null,
        ?string $notificationProfileID = null,
        ?array $parameters = null,
        ?RequestOptions $requestOptions = null,
    ): NotificationSettingNewResponse;

    /**
     * @api
     *
     * @param string $id the id of the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingGetResponse;

    /**
     * @api
     *
     * @param array{
     *   associatedRecordType?: array{eq?: 'account'|'phone_number'|Eq},
     *   channelTypeID?: array{
     *     eq?: 'webhook'|'sms'|'email'|'voice'|\Telnyx\NotificationSettings\NotificationSettingListParams\Filter\ChannelTypeID\Eq,
     *   },
     *   notificationChannel?: array{eq?: string},
     *   notificationEventConditionID?: array{eq?: string},
     *   notificationProfileID?: array{eq?: string},
     *   status?: array{
     *     eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|\Telnyx\NotificationSettings\NotificationSettingListParams\Filter\Status\Eq,
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<NotificationSetting>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id the id of the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingDeleteResponse;
}
