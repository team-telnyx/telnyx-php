<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Porting\Events\EventGetResponse;
use Telnyx\Porting\Events\EventListParams;
use Telnyx\Porting\Events\EventListParams\Filter;
use Telnyx\Porting\Events\EventListResponse;
use Telnyx\Porting\Events\EventListResponse\PortingEventDeletedPayload;
use Telnyx\Porting\Events\EventListResponse\PortingEventMessagingChangedPayload;
use Telnyx\Porting\Events\EventListResponse\PortingEventNewCommentEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventSplitEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventStatusChangedEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventWithoutWebhook;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\EventsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Porting\Events\EventListParams\Filter
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
     * Show a specific porting event.
     *
     * @param string $id identifies the porting event
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
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingEventDeletedPayload|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook,>,>
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
            path: 'porting/events',
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
     * Republish a specific porting event.
     *
     * @param string $id identifies the porting event
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
            path: ['porting/events/%1$s/republish', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
