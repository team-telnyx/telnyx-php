<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\NotificationChannels\NotificationChannel;
use Telnyx\NotificationChannels\NotificationChannelCreateParams\ChannelTypeID;
use Telnyx\NotificationChannels\NotificationChannelDeleteResponse;
use Telnyx\NotificationChannels\NotificationChannelGetResponse;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter;
use Telnyx\NotificationChannels\NotificationChannelListParams\Page;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationChannelsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NotificationChannels\NotificationChannelListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NotificationChannels\NotificationChannelListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NotificationChannelsService implements NotificationChannelsContract
{
    /**
     * @api
     */
    public NotificationChannelsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotificationChannelsRawService($client);
    }

    /**
     * @api
     *
     * Create a notification channel.
     *
     * @param string $channelDestination the destination associated with the channel type
     * @param ChannelTypeID|value-of<ChannelTypeID> $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $channelDestination = null,
        ChannelTypeID|string|null $channelTypeID = null,
        ?string $notificationProfileID = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotificationChannelNewResponse {
        $params = Util::removeNulls(
            [
                'channelDestination' => $channelDestination,
                'channelTypeID' => $channelTypeID,
                'notificationProfileID' => $notificationProfileID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a notification channel.
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationChannelGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a notification channel.
     *
     * @param string $notificationChannelID the id of the resource
     * @param string $channelDestination the destination associated with the channel type
     * @param \Telnyx\NotificationChannels\NotificationChannelUpdateParams\ChannelTypeID|value-of<\Telnyx\NotificationChannels\NotificationChannelUpdateParams\ChannelTypeID> $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $notificationChannelID,
        ?string $channelDestination = null,
        \Telnyx\NotificationChannels\NotificationChannelUpdateParams\ChannelTypeID|string|null $channelTypeID = null,
        ?string $notificationProfileID = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotificationChannelUpdateResponse {
        $params = Util::removeNulls(
            [
                'channelDestination' => $channelDestination,
                'channelTypeID' => $channelTypeID,
                'notificationProfileID' => $notificationProfileID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($notificationChannelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List notification channels.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<NotificationChannel>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a notification channel.
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationChannelDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
