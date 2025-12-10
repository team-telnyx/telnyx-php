<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\Porting\Events\EventGetResponse;
use Telnyx\Porting\Events\EventListParams\Filter\Type;
use Telnyx\Porting\Events\EventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\EventsContract;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   createdAt?: array{
     *     gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *   },
     *   portingOrderID?: string,
     *   type?: 'porting_order.deleted'|'porting_order.loa_updated'|'porting_order.messaging_changed'|'porting_order.status_changed'|'porting_order.sharing_token_expired'|'porting_order.new_comment'|'porting_order.split'|Type,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[porting_order_id], filter[created_at][gte], filter[created_at][lte]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<EventListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->republish($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
