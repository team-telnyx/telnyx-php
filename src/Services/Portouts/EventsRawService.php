<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams;
use Telnyx\Portouts\Events\EventListParams\Filter\EventType;
use Telnyx\Portouts\Events\EventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\EventsRawContract;

final class EventsRawService implements EventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Show a specific port-out event.
     *
     * @param string $id identifies the port-out event
     *
     * @return BaseResponse<EventGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     createdAt?: array{
     *       gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *     },
     *     eventType?: 'portout.status_changed'|'portout.new_comment'|'portout.foc_date_changed'|EventType,
     *     portoutID?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|EventListParams $params
     *
     * @return BaseResponse<EventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *
     * @param string $id identifies the port-out event
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['portouts/events/%1$s/republish', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
