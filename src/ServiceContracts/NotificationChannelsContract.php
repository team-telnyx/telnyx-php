<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NotificationChannels\NotificationChannelCreateParams\ChannelTypeID;
use Telnyx\NotificationChannels\NotificationChannelDeleteResponse;
use Telnyx\NotificationChannels\NotificationChannelGetResponse;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter;
use Telnyx\NotificationChannels\NotificationChannelListParams\Page;
use Telnyx\NotificationChannels\NotificationChannelListResponse;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateParams\ChannelTypeID as ChannelTypeID1;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NotificationChannelsContract
{
    /**
     * @api
     *
     * @param string $channelDestination the destination associated with the channel type
     * @param ChannelTypeID|value-of<ChannelTypeID> $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     *
     * @return NotificationChannelNewResponse<HasRawResponse>
     */
    public function create(
        $channelDestination = omit,
        $channelTypeID = omit,
        $notificationProfileID = omit,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelNewResponse;

    /**
     * @api
     *
     * @return NotificationChannelGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelGetResponse;

    /**
     * @api
     *
     * @param string $channelDestination the destination associated with the channel type
     * @param ChannelTypeID1|value-of<ChannelTypeID1> $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     *
     * @return NotificationChannelUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $channelDestination = omit,
        $channelTypeID = omit,
        $notificationProfileID = omit,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NotificationChannelListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelListResponse;

    /**
     * @api
     *
     * @return NotificationChannelDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelDeleteResponse;
}
