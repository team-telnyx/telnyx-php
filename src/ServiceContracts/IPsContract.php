<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPListParams\Filter;
use Telnyx\IPs\IPListParams\Page;
use Telnyx\IPs\IPListResponse;
use Telnyx\IPs\IPNewResponse;
use Telnyx\IPs\IPUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface IPsContract
{
    /**
     * @api
     *
     * @param string $ipAddress IP adddress represented by this resource
     * @param string $connectionID ID of the IP Connection to which this IP should be attached
     * @param int $port port to use when connecting to this IP
     *
     * @return IPNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $ipAddress,
        $connectionID = omit,
        $port = omit,
        ?RequestOptions $requestOptions = null,
    ): IPNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return IPNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): IPNewResponse;

    /**
     * @api
     *
     * @return IPGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse;

    /**
     * @api
     *
     * @return IPGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse;

    /**
     * @api
     *
     * @param string $ipAddress IP adddress represented by this resource
     * @param string $connectionID ID of the IP Connection to which this IP should be attached
     * @param int $port port to use when connecting to this IP
     *
     * @return IPUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $ipAddress,
        $connectionID = omit,
        $port = omit,
        ?RequestOptions $requestOptions = null,
    ): IPUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return IPUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): IPUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return IPListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): IPListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return IPListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): IPListResponse;

    /**
     * @api
     *
     * @return IPDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPDeleteResponse;

    /**
     * @api
     *
     * @return IPDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): IPDeleteResponse;
}
