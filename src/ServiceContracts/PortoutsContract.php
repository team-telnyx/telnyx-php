<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams\Filter;
use Telnyx\Portouts\PortoutListParams\Page;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutListResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams\Status;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PortoutsContract
{
    /**
     * @api
     *
     * @return PortoutGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortoutGetResponse;

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
    ): PortoutGetResponse;

    /**
     * @api
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
    ): PortoutListResponse;

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
    ): PortoutListResponse;

    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): PortoutListRejectionCodesResponse;

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
    ): PortoutListRejectionCodesResponse;

    /**
     * @api
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
    ): PortoutUpdateStatusResponse;

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
        ?RequestOptions $requestOptions = null,
    ): PortoutUpdateStatusResponse;
}
