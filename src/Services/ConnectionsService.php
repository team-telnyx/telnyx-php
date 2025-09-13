<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Connections\ConnectionGetResponse;
use Telnyx\Connections\ConnectionListActiveCallsParams;
use Telnyx\Connections\ConnectionListActiveCallsParams\Page as Page1;
use Telnyx\Connections\ConnectionListActiveCallsResponse;
use Telnyx\Connections\ConnectionListParams;
use Telnyx\Connections\ConnectionListParams\Filter;
use Telnyx\Connections\ConnectionListParams\Page;
use Telnyx\Connections\ConnectionListParams\Sort;
use Telnyx\Connections\ConnectionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ConnectionsContract;

use const Telnyx\Core\OMIT as omit;

final class ConnectionsService implements ConnectionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves the high-level details of an existing connection. To retrieve specific authentication information, use the endpoint for the specific connection type.
     *
     * @return ConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

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
    ): ConnectionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['connections/%1$s', $id],
            options: $requestOptions,
            convert: ConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your connections irrespective of type.
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
    ): ConnectionListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): ConnectionListResponse {
        [$parsed, $options] = ConnectionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'connections',
            query: $parsed,
            options: $options,
            convert: ConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists all active calls for given connection. Acceptable connections are either SIP connections with webhook_url or xml_request_url, call control or texml. Returned results are cursor paginated.
     *
     * @param Page1 $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @return ConnectionListActiveCallsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listActiveCalls(
        string $connectionID,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ConnectionListActiveCallsResponse {
        $params = ['page' => $page];

        return $this->listActiveCallsRaw($connectionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): ConnectionListActiveCallsResponse {
        [$parsed, $options] = ConnectionListActiveCallsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['connections/%1$s/active_calls', $connectionID],
            query: $parsed,
            options: $options,
            convert: ConnectionListActiveCallsResponse::class,
        );
    }
}
