<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\NotificationSettings\NotificationSetting;
use Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationSettingsContract;

/**
 * Notification settings operations.
 *
 * @phpstan-import-type ParameterShape from \Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter
 * @phpstan-import-type FilterShape from \Telnyx\NotificationSettings\NotificationSettingListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NotificationSetting>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationSettingDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
