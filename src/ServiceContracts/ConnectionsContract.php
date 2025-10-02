<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Connections\ConnectionGetResponse;
use Telnyx\Connections\ConnectionListActiveCallsResponse;
use Telnyx\Connections\ConnectionListParams\Filter;
use Telnyx\Connections\ConnectionListParams\Page;
use Telnyx\Connections\ConnectionListParams\Sort;
use Telnyx\Connections\ConnectionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ConnectionsContract
{
    /**
     * @api
     *
     * @return ConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse;

    /**
     * @api
     *
     * @return ConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_name], filter[fqdn], filter[outbound_voice_profile_id], filter[outbound.outbound_voice_profile_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @return ConnectionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): ConnectionListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConnectionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConnectionListResponse;

    /**
     * @api
     *
     * @param Telnyx\Connections\ConnectionListActiveCallsParams\Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @return ConnectionListActiveCallsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listActiveCalls(
        string $connectionID,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): ConnectionListActiveCallsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConnectionListActiveCallsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listActiveCallsRaw(
        string $connectionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConnectionListActiveCallsResponse;
}
