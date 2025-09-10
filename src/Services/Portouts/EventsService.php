<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams;
use Telnyx\Portouts\Events\EventListParams\Filter;
use Telnyx\Portouts\Events\EventListParams\Page;
use Telnyx\Portouts\Events\EventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\EventsContract;

use const Telnyx\Core\OMIT as omit;

final class EventsService implements EventsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Show a specific port-out event.
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): EventGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['portouts/events/%1$s', $id],
            options: $requestOptions,
            convert: EventGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all port-out events.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): EventListResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'portouts/events',
            query: $parsed,
            options: $options,
            convert: EventListResponse::class,
        );
    }

    /**
     * @api
     *
     * Republish a specific port-out event.
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['portouts/events/%1$s/republish', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
