<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Connections\ConnectionGetResponse;
use Telnyx\Connections\ConnectionListActiveCallsParams;
use Telnyx\Connections\ConnectionListActiveCallsResponse;
use Telnyx\Connections\ConnectionListParams;
use Telnyx\Connections\ConnectionListParams\Filter;
use Telnyx\Connections\ConnectionListParams\Page;
use Telnyx\Connections\ConnectionListParams\Sort;
use Telnyx\Connections\ConnectionListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ConnectionsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Connections\ConnectionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Connections\ConnectionListParams\Page
 * @phpstan-import-type PageShape from \Telnyx\Connections\ConnectionListActiveCallsParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConnectionsRawService implements ConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves the high-level details of an existing connection. To retrieve specific authentication information, use the endpoint for the specific connection type.
     *
     * @param string $id IP Connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|ConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<ConnectionListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'connections',
            query: $parsed,
            options: $options,
            convert: ConnectionListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Lists all active calls for given connection. Acceptable connections are either SIP connections with webhook_url or xml_request_url, call control or texml. Returned results are cursor paginated.
     *
     * @param string $connectionID Telnyx connection id
     * @param array{
     *   page?: ConnectionListActiveCallsParams\Page|PageShape1,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|ConnectionListActiveCallsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ConnectionListActiveCallsResponse>>
     *
     * @throws APIException
     */
    public function listActiveCalls(
        string $connectionID,
        array|ConnectionListActiveCallsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConnectionListActiveCallsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['connections/%1$s/active_calls', $connectionID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ConnectionListActiveCallsResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
