<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\NotificationChannels\NotificationChannel;
use Telnyx\NotificationChannels\NotificationChannelCreateParams;
use Telnyx\NotificationChannels\NotificationChannelCreateParams\ChannelTypeID;
use Telnyx\NotificationChannels\NotificationChannelDeleteResponse;
use Telnyx\NotificationChannels\NotificationChannelGetResponse;
use Telnyx\NotificationChannels\NotificationChannelListParams;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateParams;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationChannelsRawContract;

/**
 * Notification settings operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\NotificationChannels\NotificationChannelListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NotificationChannelsRawService implements NotificationChannelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a notification channel.
     *
     * @param array{
     *   channelDestination?: string,
     *   channelTypeID?: ChannelTypeID|value-of<ChannelTypeID>,
     *   notificationProfileID?: string,
     * }|NotificationChannelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationChannelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NotificationChannelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationChannelCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'notification_channels',
            body: (object) $parsed,
            options: $options,
            convert: NotificationChannelNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a notification channel.
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationChannelGetResponse>
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
            path: ['notification_channels/%1$s', $id],
            options: $requestOptions,
            convert: NotificationChannelGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a notification channel.
     *
     * @param string $notificationChannelID the id of the resource
     * @param array{
     *   channelDestination?: string,
     *   channelTypeID?: NotificationChannelUpdateParams\ChannelTypeID|value-of<NotificationChannelUpdateParams\ChannelTypeID>,
     *   notificationProfileID?: string,
     * }|NotificationChannelUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationChannelUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $notificationChannelID,
        array|NotificationChannelUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationChannelUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['notification_channels/%1$s', $notificationChannelID],
            body: (object) $parsed,
            options: $options,
            convert: NotificationChannelUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List notification channels.
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|NotificationChannelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NotificationChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationChannelListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationChannelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'notification_channels',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: NotificationChannel::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a notification channel.
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationChannelDeleteResponse>
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
            path: ['notification_channels/%1$s', $id],
            options: $requestOptions,
            convert: NotificationChannelDeleteResponse::class,
        );
    }
}
