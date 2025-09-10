<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\NotificationSettings\NotificationSettingCreateParams;
use Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter;
use Telnyx\NotificationSettings\NotificationSettingListParams\Page;
use Telnyx\NotificationSettings\NotificationSettingListResponse;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationSettingsContract;

use const Telnyx\Core\OMIT as omit;

final class NotificationSettingsService implements NotificationSettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a notification setting.
     *
     * @param string $notificationChannelID a UUID reference to the associated Notification Channel
     * @param string $notificationEventConditionID a UUID reference to the associated Notification Event Condition
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     * @param list<Parameter> $parameters
     */
    public function create(
        $notificationChannelID = omit,
        $notificationEventConditionID = omit,
        $notificationProfileID = omit,
        $parameters = omit,
        ?RequestOptions $requestOptions = null,
    ): NotificationSettingNewResponse {
        [$parsed, $options] = NotificationSettingCreateParams::parseRequest(
            [
                'notificationChannelID' => $notificationChannelID,
                'notificationEventConditionID' => $notificationEventConditionID,
                'notificationProfileID' => $notificationProfileID,
                'parameters' => $parameters,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'notification_settings',
            body: (object) $parsed,
            options: $options,
            convert: NotificationSettingNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a notification setting.
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['notification_settings/%1$s', $id],
            options: $requestOptions,
            convert: NotificationSettingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List notification settings.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingListResponse {
        [$parsed, $options] = NotificationSettingListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notification_settings',
            query: $parsed,
            options: $options,
            convert: NotificationSettingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a notification setting.
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['notification_settings/%1$s', $id],
            options: $requestOptions,
            convert: NotificationSettingDeleteResponse::class,
        );
    }
}
