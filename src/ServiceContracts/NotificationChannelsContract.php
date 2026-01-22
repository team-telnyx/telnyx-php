<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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

/**
 * @phpstan-import-type FilterShape from \Telnyx\NotificationChannels\NotificationChannelListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NotificationChannels\NotificationChannelListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NotificationChannelsContract
{
    /**
     * @api
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
    ): NotificationChannelNewResponse;

    /**
     * @api
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationChannelGetResponse;

    /**
     * @api
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
    ): NotificationChannelUpdateResponse;

    /**
     * @api
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
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationChannelDeleteResponse;
}
