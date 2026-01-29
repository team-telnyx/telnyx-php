<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Exceptions\APIException;
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

/**
 * @phpstan-import-type FilterShape from \Telnyx\Porting\Events\EventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Porting\Events\EventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EventsContract
{
    /**
     * @api
     *
     * @param string $id identifies the porting event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EventGetResponse;

    /**
     * @api
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
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the porting event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
