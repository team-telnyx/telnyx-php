<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\Events\EventGetResponse;
use Telnyx\Porting\Events\EventListParams;
use Telnyx\Porting\Events\EventListParams\Filter\Type;
use Telnyx\Porting\Events\EventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\EventsContract;

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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): EventGetResponse {
        /** @var BaseResponse<EventGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['porting/events/%1$s', $id],
            options: $requestOptions,
            convert: EventGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all porting events.
     *
     * @param array{
     *   filter?: array{
     *     created_at?: array{
     *       gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *     },
     *     porting_order_id?: string,
     *     type?: 'porting_order.deleted'|'porting_order.loa_updated'|'porting_order.messaging_changed'|'porting_order.status_changed'|'porting_order.sharing_token_expired'|'porting_order.new_comment'|'porting_order.split'|Type,
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
            path: 'porting/events',
            query: $parsed,
            options: $options,
            convert: EventListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Republish a specific porting event.
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
            path: ['porting/events/%1$s/republish', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
