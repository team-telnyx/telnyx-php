<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Page;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\LogMessagesContract;

use const Telnyx\Core\OMIT as omit;

final class LogMessagesService implements LogMessagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a log message for an external connection associated with your account.
     *
     * @return LogMessageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return LogMessageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): LogMessageGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['external_connections/log_messages/%1$s', $id],
            options: $requestOptions,
            convert: LogMessageGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of log messages for all external connections associated with your account.
     *
     * @param Filter $filter Filter parameter for log messages (deepObject style). Supports filtering by external_connection_id and telephone_number with eq/contains operations.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return LogMessageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): LogMessageListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return LogMessageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): LogMessageListResponse {
        [$parsed, $options] = LogMessageListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'external_connections/log_messages',
            query: $parsed,
            options: $options,
            convert: LogMessageListResponse::class,
        );
    }

    /**
     * @api
     *
     * Dismiss a log message for an external connection associated with your account.
     *
     * @return LogMessageDismissResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function dismiss(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageDismissResponse {
        $params = [];

        return $this->dismissRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return LogMessageDismissResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function dismissRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): LogMessageDismissResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['external_connections/log_messages/%1$s', $id],
            options: $requestOptions,
            convert: LogMessageDismissResponse::class,
        );
    }
}
