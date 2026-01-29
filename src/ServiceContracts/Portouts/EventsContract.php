<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams\Filter;
use Telnyx\Portouts\Events\EventListParams\Page;
use Telnyx\Portouts\Events\EventListResponse\WebhookPortoutFocDateChanged;
use Telnyx\Portouts\Events\EventListResponse\WebhookPortoutNewComment;
use Telnyx\Portouts\Events\EventListResponse\WebhookPortoutStatusChanged;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\Events\EventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Portouts\Events\EventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EventsContract
{
    /**
     * @api
     *
     * @param string $id identifies the port-out event
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<WebhookPortoutStatusChanged|WebhookPortoutNewComment|WebhookPortoutFocDateChanged,>
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
     * @param string $id identifies the port-out event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
