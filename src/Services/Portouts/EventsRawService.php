<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams;
use Telnyx\Portouts\Events\EventListParams\Filter;
use Telnyx\Portouts\Events\EventListResponse;
use Telnyx\Portouts\Events\WebhookPortoutFocDateChanged;
use Telnyx\Portouts\Events\WebhookPortoutNewComment;
use Telnyx\Portouts\Events\WebhookPortoutStatusChanged;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\EventsRawContract;

/**
 * Number portout operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\Events\EventListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<WebhookPortoutStatusChanged|WebhookPortoutNewComment|WebhookPortoutFocDateChanged,>,>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'portouts/events',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: EventListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Republish a specific port-out event.
     *
     * @param string $id identifies the port-out event
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
