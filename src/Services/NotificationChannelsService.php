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
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationChannelsContract;

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
     * @param 'sms'|'voice'|'email'|'webhook'|ChannelTypeID $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     *
     * @throws APIException
     */
    public function create(
        ?string $channelDestination = null,
        string|ChannelTypeID|null $channelTypeID = null,
        ?string $notificationProfileID = null,
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @param 'sms'|'voice'|'email'|'webhook'|\Telnyx\NotificationChannels\NotificationChannelUpdateParams\ChannelTypeID $channelTypeID A Channel Type ID
     * @param string $notificationProfileID a UUID reference to the associated Notification Profile
     *
     * @throws APIException
     */
    public function update(
        string $notificationChannelID,
        ?string $channelDestination = null,
        string|\Telnyx\NotificationChannels\NotificationChannelUpdateParams\ChannelTypeID|null $channelTypeID = null,
        ?string $notificationProfileID = null,
        ?RequestOptions $requestOptions = null,
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
     * @param array{
     *   associatedRecordType?: array{eq?: 'account'|'phone_number'|Eq},
     *   channelTypeID?: array{
     *     eq?: 'webhook'|'sms'|'email'|'voice'|\Telnyx\NotificationChannels\NotificationChannelListParams\Filter\ChannelTypeID\Eq,
     *   },
     *   notificationChannel?: array{eq?: string},
     *   notificationEventConditionID?: array{eq?: string},
     *   notificationProfileID?: array{eq?: string},
     *   status?: array{
     *     eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|\Telnyx\NotificationChannels\NotificationChannelListParams\Filter\Status\Eq,
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<NotificationChannel>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
