<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams;
use Telnyx\Portouts\PortoutListParams\Filter\Status;
use Telnyx\Portouts\PortoutListParams\Filter\StatusIn;
use Telnyx\Portouts\PortoutListRejectionCodesParams;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutListResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortoutGetResponse {
        /** @var BaseResponse<PortoutGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['portouts/%1$s', $id],
            options: $requestOptions,
            convert: PortoutGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the portout requests according to filters
     *
     * @param array{
     *   filter?: array{
     *     carrier_name?: string,
     *     country_code?: string,
     *     country_code_in?: list<string>,
     *     foc_date?: string|\DateTimeInterface,
     *     inserted_at?: array{
     *       gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *     },
     *     phone_number?: string,
     *     pon?: string,
     *     ported_out_at?: array{
     *       gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *     },
     *     spid?: string,
     *     status?: 'pending'|'authorized'|'ported'|'rejected'|'rejected-pending'|'canceled'|Status,
     *     status_in?: list<'pending'|'authorized'|'ported'|'rejected'|'rejected-pending'|'canceled'|StatusIn>,
     *     support_key?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|PortoutListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PortoutListParams $params,
        ?RequestOptions $requestOptions = null
    ): PortoutListResponse {
        [$parsed, $options] = PortoutListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PortoutListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'portouts',
            query: $parsed,
            options: $options,
            convert: PortoutListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Given a port-out ID, list rejection codes that are eligible for that port-out
     *
     * @param array{
     *   filter?: array{code?: int|list<int>}
     * }|PortoutListRejectionCodesParams $params
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        array|PortoutListRejectionCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortoutListRejectionCodesResponse {
        [$parsed, $options] = PortoutListRejectionCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PortoutListRejectionCodesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['portouts/rejections/%1$s', $portoutID],
            query: $parsed,
            options: $options,
            convert: PortoutListRejectionCodesResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Authorize or reject portout request
     *
     * @param PortoutUpdateStatusParams\Status|value-of<PortoutUpdateStatusParams\Status> $status
     * @param array{
     *   id: string, reason: string, host_messaging?: bool
     * }|PortoutUpdateStatusParams $params
     *
     * @throws APIException
     */
    public function updateStatus(
        PortoutUpdateStatusParams\Status|string $status,
        array|PortoutUpdateStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortoutUpdateStatusResponse {
        [$parsed, $options] = PortoutUpdateStatusParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        /** @var BaseResponse<PortoutUpdateStatusResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['portouts/%1$s/%2$s', $id, $status],
            body: (object) array_diff_key($parsed, ['id']),
            options: $options,
            convert: PortoutUpdateStatusResponse::class,
        );

        return $response->parse();
    }
}
