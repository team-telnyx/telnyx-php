<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationSettings\NotificationSettingCreateParams;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationSettings\NotificationSettingListResponse;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationSettingsContract;

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
     * @param array{
     *   notificationChannelID?: string,
     *   notificationEventConditionID?: string,
     *   notificationProfileID?: string,
     *   parameters?: list<array{name?: string, value?: string}>,
     * }|NotificationSettingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NotificationSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationSettingNewResponse {
        [$parsed, $options] = NotificationSettingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationSettingNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'notification_settings',
            body: (object) $parsed,
            options: $options,
            convert: NotificationSettingNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a notification setting.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingGetResponse {
        /** @var BaseResponse<NotificationSettingGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['notification_settings/%1$s', $id],
            options: $requestOptions,
            convert: NotificationSettingGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List notification settings.
     *
     * @param array{
     *   filter?: array{
     *     associatedRecordType?: array{eq?: 'account'|'phone_number'|Eq},
     *     channelTypeID?: array{
     *       eq?: 'webhook'|'sms'|'email'|'voice'|NotificationSettingListParams\Filter\ChannelTypeID\Eq,
     *     },
     *     notificationChannel?: array{eq?: string},
     *     notificationEventConditionID?: array{eq?: string},
     *     notificationProfileID?: array{eq?: string},
     *     status?: array{
     *       eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|NotificationSettingListParams\Filter\Status\Eq,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NotificationSettingListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NotificationSettingListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationSettingListResponse {
        [$parsed, $options] = NotificationSettingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationSettingListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'notification_settings',
            query: $parsed,
            options: $options,
            convert: NotificationSettingListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a notification setting.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingDeleteResponse {
        /** @var BaseResponse<NotificationSettingDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['notification_settings/%1$s', $id],
            options: $requestOptions,
            convert: NotificationSettingDeleteResponse::class,
        );

        return $response->parse();
    }
}
