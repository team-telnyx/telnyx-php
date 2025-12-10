<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationSettings\NotificationSetting;
use Telnyx\NotificationSettings\NotificationSettingCreateParams;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationSettingsRawContract;

final class NotificationSettingsRawService implements NotificationSettingsRawContract
{
    // @phpstan-ignore-next-line
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
     * @return BaseResponse<NotificationSettingNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NotificationSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationSettingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *
     * @param string $id the id of the resource
     *
     * @return BaseResponse<NotificationSettingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<DefaultPagination<NotificationSetting>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationSettingListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationSettingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'notification_settings',
            query: $parsed,
            options: $options,
            convert: NotificationSetting::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a notification setting.
     *
     * @param string $id the id of the resource
     *
     * @return BaseResponse<NotificationSettingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['notification_settings/%1$s', $id],
            options: $requestOptions,
            convert: NotificationSettingDeleteResponse::class,
        );
    }
}
