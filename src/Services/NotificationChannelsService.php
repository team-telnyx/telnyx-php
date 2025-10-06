<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationChannels\NotificationChannelCreateParams;
use Telnyx\NotificationChannels\NotificationChannelCreateParams\ChannelTypeID;
use Telnyx\NotificationChannels\NotificationChannelDeleteResponse;
use Telnyx\NotificationChannels\NotificationChannelGetResponse;
use Telnyx\NotificationChannels\NotificationChannelListParams;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter;
use Telnyx\NotificationChannels\NotificationChannelListParams\Page;
use Telnyx\NotificationChannels\NotificationChannelListResponse;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateParams;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationChannelsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $channelDestination the destination associated with the channel type
     * @param ChannelTypeID|value-of<ChannelTypeID> $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     *
     * @throws APIException
     */
    public function create(
        $channelDestination = omit,
        $channelTypeID = omit,
        $notificationProfileID = omit,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelNewResponse {
        $params = [
            'channelDestination' => $channelDestination,
            'channelTypeID' => $channelTypeID,
            'notificationProfileID' => $notificationProfileID,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelNewResponse {
        [$parsed, $options] = NotificationChannelCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $channelDestination the destination associated with the channel type
     * @param NotificationChannelUpdateParams\ChannelTypeID|value-of<NotificationChannelUpdateParams\ChannelTypeID> $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $channelDestination = omit,
        $channelTypeID = omit,
        $notificationProfileID = omit,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelUpdateResponse {
        $params = [
            'channelDestination' => $channelDestination,
            'channelTypeID' => $channelTypeID,
            'notificationProfileID' => $notificationProfileID,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelUpdateResponse {
        [$parsed, $options] = NotificationChannelUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelListResponse {
        [$parsed, $options] = NotificationChannelListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['notification_channels/%1$s', $id],
            options: $requestOptions,
            convert: NotificationChannelDeleteResponse::class,
        );
    }
}
