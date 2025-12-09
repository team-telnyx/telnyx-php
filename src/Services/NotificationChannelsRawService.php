<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationChannels\NotificationChannelCreateParams;
use Telnyx\NotificationChannels\NotificationChannelCreateParams\ChannelTypeID;
use Telnyx\NotificationChannels\NotificationChannelDeleteResponse;
use Telnyx\NotificationChannels\NotificationChannelGetResponse;
use Telnyx\NotificationChannels\NotificationChannelListParams;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationChannels\NotificationChannelListResponse;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateParams;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationChannelsRawContract;

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
     *   channelTypeID?: 'sms'|'voice'|'email'|'webhook'|ChannelTypeID,
     *   notificationProfileID?: string,
     * }|NotificationChannelCreateParams $params
     *
     * @return BaseResponse<NotificationChannelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NotificationChannelCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<NotificationChannelGetResponse>
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
     * @param string $id the id of the resource
     * @param array{
     *   channelDestination?: string,
     *   channelTypeID?: 'sms'|'voice'|'email'|'webhook'|NotificationChannelUpdateParams\ChannelTypeID,
     *   notificationProfileID?: string,
     * }|NotificationChannelUpdateParams $params
     *
     * @return BaseResponse<NotificationChannelUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|NotificationChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationChannelUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['notification_channels/%1$s', $id],
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
     *   filter?: array{
     *     associatedRecordType?: array{eq?: 'account'|'phone_number'|Eq},
     *     channelTypeID?: array{
     *       eq?: 'webhook'|'sms'|'email'|'voice'|NotificationChannelListParams\Filter\ChannelTypeID\Eq,
     *     },
     *     notificationChannel?: array{eq?: string},
     *     notificationEventConditionID?: array{eq?: string},
     *     notificationProfileID?: array{eq?: string},
     *     status?: array{
     *       eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|NotificationChannelListParams\Filter\Status\Eq,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NotificationChannelListParams $params
     *
     * @return BaseResponse<NotificationChannelListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationChannelListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationChannelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'notification_channels',
            query: $parsed,
            options: $options,
            convert: NotificationChannelListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a notification channel.
     *
     * @param string $id the id of the resource
     *
     * @return BaseResponse<NotificationChannelDeleteResponse>
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
            path: ['notification_channels/%1$s', $id],
            options: $requestOptions,
            convert: NotificationChannelDeleteResponse::class,
        );
    }
}
