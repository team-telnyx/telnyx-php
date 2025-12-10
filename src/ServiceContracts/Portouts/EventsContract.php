<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams\Filter\EventType;
use Telnyx\Portouts\Events\EventListResponse;
use Telnyx\RequestOptions;

interface EventsContract
{
    /**
     * @api
     *
     * @param string $id identifies the port-out event
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): EventGetResponse;

    /**
     * @api
     *
     * @param array{
     *   createdAt?: array{
     *     gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *   },
     *   eventType?: 'portout.status_changed'|'portout.new_comment'|'portout.foc_date_changed'|EventType,
     *   portoutID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at]
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
    ): EventListResponse;

    /**
     * @api
     *
     * @param string $id identifies the port-out event
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
