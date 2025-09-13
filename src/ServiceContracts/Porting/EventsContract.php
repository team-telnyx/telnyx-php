<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Porting\Events\EventGetResponse;
use Telnyx\Porting\Events\EventListParams\Filter;
use Telnyx\Porting\Events\EventListParams\Page;
use Telnyx\Porting\Events\EventListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface EventsContract
{
    /**
     * @api
     *
     * @return EventGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): EventGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[porting_order_id], filter[created_at][gte], filter[created_at][lte]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return EventListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): EventListResponse;

    /**
     * @api
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
