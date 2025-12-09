<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams\Filter\Status;
use Telnyx\Portouts\PortoutListParams\Filter\StatusIn;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutListResponse;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortoutsContract;
use Telnyx\Services\Portouts\CommentsService;
use Telnyx\Services\Portouts\EventsService;
use Telnyx\Services\Portouts\ReportsService;
use Telnyx\Services\Portouts\SupportingDocumentsService;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   carrierName?: string,
     *   countryCode?: string,
     *   countryCodeIn?: list<string>,
     *   focDate?: string|\DateTimeInterface,
     *   insertedAt?: array{
     *     gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *   },
     *   phoneNumber?: string,
     *   pon?: string,
     *   portedOutAt?: array{
     *     gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *   },
     *   spid?: string,
     *   status?: 'pending'|'authorized'|'ported'|'rejected'|'rejected-pending'|'canceled'|Status,
     *   statusIn?: list<'pending'|'authorized'|'ported'|'rejected'|'rejected-pending'|'canceled'|StatusIn>,
     *   supportKey?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): PortoutListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param array{
     *   code?: int|list<int>
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in]
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        ?array $filter = null,
        ?RequestOptions $requestOptions = null,
    ): PortoutListRejectionCodesResponse {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRejectionCodes($portoutID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Authorize or reject portout request
     *
     * @param \Telnyx\Portouts\PortoutUpdateStatusParams\Status|value-of<\Telnyx\Portouts\PortoutUpdateStatusParams\Status> $status Path param: Updated portout status
     * @param string $id Path param: Portout id
     * @param string $reason Body param: Provide a reason if rejecting the port out request
     * @param bool $hostMessaging Body param: Indicates whether messaging services should be maintained with Telnyx after the port out completes
     *
     * @throws APIException
     */
    public function updateStatus(
        \Telnyx\Portouts\PortoutUpdateStatusParams\Status|string $status,
        string $id,
        string $reason,
        bool $hostMessaging = false,
        ?RequestOptions $requestOptions = null,
    ): PortoutUpdateStatusResponse {
        $params = [
            'id' => $id, 'reason' => $reason, 'hostMessaging' => $hostMessaging,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStatus($status, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
