<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams;
use Telnyx\Portouts\Events\EventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\EventsContract;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): EventGetResponse {
        /** @var BaseResponse<EventGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['portouts/events/%1$s', $id],
            options: $requestOptions,
            convert: EventGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all port-out events.
     *
     * @param array{
     *   filter?: array{
     *     created_at?: array{
     *       gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *     },
     *     event_type?: 'portout.status_changed'|'portout.new_comment'|'portout.foc_date_changed',
     *     portout_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|EventListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): EventListResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<EventListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'portouts/events',
            query: $parsed,
            options: $options,
            convert: EventListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Republish a specific port-out event.
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['portouts/events/%1$s/republish', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
