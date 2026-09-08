<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
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
     * Returns the details of a single port-out event, including its type and payload.
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
     * Returns a paginated list of port-out events on your account, such as status changes on port-out requests, with support for filtering.
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
        $params = array_filter(
            [
                'filter' => $filter ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Republishes the specified port-out event, triggering re-delivery of the corresponding webhook to your account.
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
