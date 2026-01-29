<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationSettings\NotificationSetting;
use Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter;
use Telnyx\NotificationSettings\NotificationSettingListParams\Page;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ParameterShape from \Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter
 * @phpstan-import-type FilterShape from \Telnyx\NotificationSettings\NotificationSettingListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NotificationSettings\NotificationSettingListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NotificationSettingsContract
{
    /**
     * @api
     *
     * @param string $notificationChannelID a UUID reference to the associated Notification Channel
     * @param string $notificationEventConditionID a UUID reference to the associated Notification Event Condition
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     * @param list<Parameter|ParameterShape> $parameters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $notificationChannelID = null,
        ?string $notificationEventConditionID = null,
        ?string $notificationProfileID = null,
        ?array $parameters = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotificationSettingNewResponse;

    /**
     * @api
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationSettingGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<NotificationSetting>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationSettingDeleteResponse;
}
