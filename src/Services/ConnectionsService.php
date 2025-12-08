<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Connections\ConnectionGetResponse;
use Telnyx\Connections\ConnectionListActiveCallsParams;
use Telnyx\Connections\ConnectionListActiveCallsResponse;
use Telnyx\Connections\ConnectionListParams;
use Telnyx\Connections\ConnectionListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ConnectionsContract;

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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse {
        /** @var BaseResponse<ConnectionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['connections/%1$s', $id],
            options: $requestOptions,
            convert: ConnectionGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your connections irrespective of type.
     *
     * @param array{
     *   filter?: array{
     *     connection_name?: array{contains?: string},
     *     fqdn?: string,
     *     outbound_voice_profile_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active',
     * }|ConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ConnectionListParams $params,
        ?RequestOptions $requestOptions = null
    ): ConnectionListResponse {
        [$parsed, $options] = ConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ConnectionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'connections',
            query: $parsed,
            options: $options,
            convert: ConnectionListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists all active calls for given connection. Acceptable connections are either SIP connections with webhook_url or xml_request_url, call control or texml. Returned results are cursor paginated.
     *
     * @param array{
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     * }|ConnectionListActiveCallsParams $params
     *
     * @throws APIException
     */
    public function listActiveCalls(
        string $connectionID,
        array|ConnectionListActiveCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConnectionListActiveCallsResponse {
        [$parsed, $options] = ConnectionListActiveCallsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ConnectionListActiveCallsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['connections/%1$s/active_calls', $connectionID],
            query: $parsed,
            options: $options,
            convert: ConnectionListActiveCallsResponse::class,
        );

        return $response->parse();
    }
}
