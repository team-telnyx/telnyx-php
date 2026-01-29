<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationSettings\NotificationSetting;
use Telnyx\NotificationSettings\NotificationSettingCreateParams;
use Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams;
use Telnyx\NotificationSettings\NotificationSettingListParams\Filter;
use Telnyx\NotificationSettings\NotificationSettingListParams\Page;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationSettingsRawContract;

/**
 * @phpstan-import-type ParameterShape from \Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter
 * @phpstan-import-type FilterShape from \Telnyx\NotificationSettings\NotificationSettingListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NotificationSettings\NotificationSettingListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   parameters?: list<Parameter|ParameterShape>,
     * }|NotificationSettingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationSettingNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NotificationSettingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationSettingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|NotificationSettingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<NotificationSetting>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationSettingListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationSettingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
