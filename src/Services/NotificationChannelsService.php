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
use Telnyx\ServiceContracts\NotificationChannelsContract;

final class NotificationChannelsService implements NotificationChannelsContract
{
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
     *   channel_destination?: string,
     *   channel_type_id?: 'sms'|'voice'|'email'|'webhook'|ChannelTypeID,
     *   notification_profile_id?: string,
     * }|NotificationChannelCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NotificationChannelCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelNewResponse {
        [$parsed, $options] = NotificationChannelCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationChannelNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'notification_channels',
            body: (object) $parsed,
            options: $options,
            convert: NotificationChannelNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a notification channel.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelGetResponse {
        /** @var BaseResponse<NotificationChannelGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['notification_channels/%1$s', $id],
            options: $requestOptions,
            convert: NotificationChannelGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a notification channel.
     *
     * @param array{
     *   channel_destination?: string,
     *   channel_type_id?: 'sms'|'voice'|'email'|'webhook'|NotificationChannelUpdateParams\ChannelTypeID,
     *   notification_profile_id?: string,
     * }|NotificationChannelUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|NotificationChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelUpdateResponse {
        [$parsed, $options] = NotificationChannelUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationChannelUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['notification_channels/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: NotificationChannelUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List notification channels.
     *
     * @param array{
     *   filter?: array{
     *     associated_record_type?: array{eq?: 'account'|'phone_number'|Eq},
     *     channel_type_id?: array{
     *       eq?: 'webhook'|'sms'|'email'|'voice'|NotificationChannelListParams\Filter\ChannelTypeID\Eq,
     *     },
     *     notification_channel?: array{eq?: string},
     *     notification_event_condition_id?: array{eq?: string},
     *     notification_profile_id?: array{eq?: string},
     *     status?: array{
     *       eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|NotificationChannelListParams\Filter\Status\Eq,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NotificationChannelListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NotificationChannelListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelListResponse {
        [$parsed, $options] = NotificationChannelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationChannelListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'notification_channels',
            query: $parsed,
            options: $options,
            convert: NotificationChannelListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a notification channel.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelDeleteResponse {
        /** @var BaseResponse<NotificationChannelDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['notification_channels/%1$s', $id],
            options: $requestOptions,
            convert: NotificationChannelDeleteResponse::class,
        );

        return $response->parse();
    }
}
