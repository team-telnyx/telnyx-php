<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationSettings\NotificationSettingListResponse;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationSettingsContract;

final class NotificationSettingsService implements NotificationSettingsContract
{
    /**
     * @api
     */
    public NotificationSettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotificationSettingsRawService($client);
    }

    /**
     * @api
     *
     * Add a notification setting.
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
    ): NotificationSettingNewResponse {
        $params = Util::removeNulls(
            [
                'notificationChannelID' => $notificationChannelID,
                'notificationEventConditionID' => $notificationEventConditionID,
                'notificationProfileID' => $notificationProfileID,
                'parameters' => $parameters,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a notification setting.
     *
     * @param string $id the id of the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List notification settings.
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
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): NotificationSettingListResponse {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a notification setting.
     *
     * @param string $id the id of the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
