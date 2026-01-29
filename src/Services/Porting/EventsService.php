<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\Porting\Events\EventGetResponse;
use Telnyx\Porting\Events\EventListParams\Filter;
use Telnyx\Porting\Events\EventListParams\Page;
use Telnyx\Porting\Events\EventListResponse\PortingEventDeletedPayload;
use Telnyx\Porting\Events\EventListResponse\PortingEventMessagingChangedPayload;
use Telnyx\Porting\Events\EventListResponse\PortingEventNewCommentEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventSplitEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventStatusChangedEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventWithoutWebhook;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\EventsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Porting\Events\EventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Porting\Events\EventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
    }

    /**
     * @api
     *
     * Show a specific porting event.
     *
     * @param string $id identifies the porting event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EventGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all porting events.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[porting_order_id], filter[created_at][gte], filter[created_at][lte]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingEventDeletedPayload|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook,>
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
     * Republish a specific porting event.
     *
     * @param string $id identifies the porting event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->republish($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
