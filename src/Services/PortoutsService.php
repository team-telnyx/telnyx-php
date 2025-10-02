<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams;
use Telnyx\Portouts\PortoutListParams\Filter;
use Telnyx\Portouts\PortoutListParams\Page;
use Telnyx\Portouts\PortoutListRejectionCodesParams;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutListResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams;
use Telnyx\Portouts\PortoutUpdateStatusParams\Status;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortoutsContract;
use Telnyx\Services\Portouts\CommentsService;
use Telnyx\Services\Portouts\EventsService;
use Telnyx\Services\Portouts\ReportsService;
use Telnyx\Services\Portouts\SupportingDocumentsService;

use const Telnyx\Core\OMIT as omit;

final class PortoutsService implements PortoutsContract
{
    /**
     * @@api
     */
    public EventsService $events;

    /**
     * @@api
     */
    public ReportsService $reports;

    /**
     * @@api
     */
    public CommentsService $comments;

    /**
     * @@api
     */
    public SupportingDocumentsService $supportingDocuments;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
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
     * @return PortoutGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortoutGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return PortoutGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PortoutGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['portouts/%1$s', $id],
            options: $requestOptions,
            convert: PortoutGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the portout requests according to filters
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return PortoutListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): PortoutListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortoutListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortoutListResponse {
        [$parsed, $options] = PortoutListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'portouts',
            query: $parsed,
            options: $options,
            convert: PortoutListResponse::class,
        );
    }

    /**
     * @api
     *
     * Given a port-out ID, list rejection codes that are eligible for that port-out
     *
     * @param Telnyx\Portouts\PortoutListRejectionCodesParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in]
     *
     * @return PortoutListRejectionCodesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): PortoutListRejectionCodesResponse {
        $params = ['filter' => $filter];

        return $this->listRejectionCodesRaw($portoutID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortoutListRejectionCodesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRejectionCodesRaw(
        string $portoutID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortoutListRejectionCodesResponse {
        [$parsed, $options] = PortoutListRejectionCodesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['portouts/rejections/%1$s', $portoutID],
            query: $parsed,
            options: $options,
            convert: PortoutListRejectionCodesResponse::class,
        );
    }

    /**
     * @api
     *
     * Authorize or reject portout request
     *
     * @param Status|value-of<Status> $status
     * @param string $id
     * @param string $reason Provide a reason if rejecting the port out request
     * @param bool $hostMessaging Indicates whether messaging services should be maintained with Telnyx after the port out completes
     *
     * @return PortoutUpdateStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateStatus(
        Status|string $status,
        $id,
        $reason,
        $hostMessaging = omit,
        ?RequestOptions $requestOptions = null,
    ): PortoutUpdateStatusResponse {
        $params = [
            'id' => $id, 'reason' => $reason, 'hostMessaging' => $hostMessaging,
        ];

        return $this->updateStatusRaw($status, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param Status|value-of<Status> $status
     * @param array<string, mixed> $params
     *
     * @return PortoutUpdateStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateStatusRaw(
        Status|string $status,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortoutUpdateStatusResponse {
        [$parsed, $options] = PortoutUpdateStatusParams::parseRequest(
            $params,
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['portouts/%1$s/%2$s', $id, $status],
            body: (object) array_diff_key($parsed, array_flip(['id'])),
            options: $options,
            convert: PortoutUpdateStatusResponse::class,
        );
    }
}
