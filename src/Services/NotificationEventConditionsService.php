<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Page;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventConditionsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[associated_record_type][eq], filter[channel_type_id][eq], filter[notification_profile_id][eq], filter[notification_channel][eq], filter[notification_event_condition_id][eq], filter[status][eq]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<NotificationEventConditionListResponse>
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
}
