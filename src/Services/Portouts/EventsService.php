<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams\Filter;
use Telnyx\Portouts\Events\WebhookPortoutFocDateChanged;
use Telnyx\Portouts\Events\WebhookPortoutNewComment;
use Telnyx\Portouts\Events\WebhookPortoutStatusChanged;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\EventsContract;

/**
 * Number portout operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\Events\EventListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Show a specific port-out event.
     *
     * @param string $id identifies the port-out event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EventGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all port-out events.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<WebhookPortoutStatusChanged|WebhookPortoutNewComment|WebhookPortoutFocDateChanged,>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Republish a specific port-out event.
     *
     * @param string $id identifies the port-out event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->republish($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
