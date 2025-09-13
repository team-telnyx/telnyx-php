<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Page;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventConditionsContract;

use const Telnyx\Core\OMIT as omit;

final class NotificationEventConditionsService implements NotificationEventConditionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of your notifications events conditions.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NotificationEventConditionListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationEventConditionListResponse {
        [$parsed, $options] = NotificationEventConditionListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notification_event_conditions',
            query: $parsed,
            options: $options,
            convert: NotificationEventConditionListResponse::class,
        );
    }
}
