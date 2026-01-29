<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\Portouts\PortoutDetails;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams\Filter;
use Telnyx\Portouts\PortoutListParams\Page;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams\Status;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortoutsContract;
use Telnyx\Services\Portouts\CommentsService;
use Telnyx\Services\Portouts\EventsService;
use Telnyx\Services\Portouts\ReportsService;
use Telnyx\Services\Portouts\SupportingDocumentsService;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\PortoutListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Portouts\PortoutListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PortoutsService implements PortoutsContract
{
    /**
     * @api
     */
    public PortoutsRawService $raw;

    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public ReportsService $reports;

    /**
     * @api
     */
    public CommentsService $comments;

    /**
     * @api
     */
    public SupportingDocumentsService $supportingDocuments;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PortoutsRawService($client);
        $this->events = new EventsService($client);
        $this->reports = new ReportsService($client);
        $this->comments = new CommentsService($client);
        $this->supportingDocuments = new SupportingDocumentsService($client);
    }

    /**
     * @api
     *
     * Returns the portout request based on the ID provided
     *
     * @param string $id Portout id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PortoutGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the portout requests according to filters
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortoutDetails>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Given a port-out ID, list rejection codes that are eligible for that port-out
     *
     * @param string $portoutID identifies a port out order
     * @param \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): PortoutListRejectionCodesResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRejectionCodes($portoutID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Authorize or reject portout request
     *
     * @param Status|value-of<Status> $status Path param: Updated portout status
     * @param string $id Path param: Portout id
     * @param string $reason Body param: Provide a reason if rejecting the port out request
     * @param bool $hostMessaging Body param: Indicates whether messaging services should be maintained with Telnyx after the port out completes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStatus(
        Status|string $status,
        string $id,
        string $reason,
        bool $hostMessaging = false,
        RequestOptions|array|null $requestOptions = null,
    ): PortoutUpdateStatusResponse {
        $params = Util::removeNulls(
            ['id' => $id, 'reason' => $reason, 'hostMessaging' => $hostMessaging]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStatus($status, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
