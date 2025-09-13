<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Porting\Events\EventGetResponse;
use Telnyx\Porting\Events\EventListParams;
use Telnyx\Porting\Events\EventListParams\Filter;
use Telnyx\Porting\Events\EventListParams\Page;
use Telnyx\Porting\Events\EventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\EventsContract;

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
     * Show a specific porting event.
     *
     * @return EventGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): EventGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting/events/%1$s', $id],
            options: $requestOptions,
            convert: EventGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all porting events.
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
    ): EventListResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting/events',
            query: $parsed,
            options: $options,
            convert: EventListResponse::class,
        );
    }

    /**
     * @api
     *
     * Republish a specific porting event.
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting/events/%1$s/republish', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
