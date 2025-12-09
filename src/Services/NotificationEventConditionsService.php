<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventConditionsContract;

final class NotificationEventConditionsService implements NotificationEventConditionsContract
{
    /**
     * @api
     */
    public NotificationEventConditionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotificationEventConditionsRawService($client);
    }

    /**
     * @api
     *
     * Returns a list of your notifications events conditions.
     *
     * @param array{
     *   associatedRecordType?: array{eq?: 'account'|'phone_number'|Eq},
     *   channelTypeID?: array{
     *     eq?: 'webhook'|'sms'|'email'|'voice'|\Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\ChannelTypeID\Eq,
     *   },
     *   notificationChannel?: array{eq?: string},
     *   notificationEventConditionID?: array{eq?: string},
     *   notificationProfileID?: array{eq?: string},
     *   status?: array{
     *     eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|\Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\Status\Eq,
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): NotificationEventConditionListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
