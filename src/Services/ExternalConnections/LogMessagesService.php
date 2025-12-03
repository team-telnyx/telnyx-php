<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\LogMessagesContract;

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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageGetResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     external_connection_id?: string,
     *     telephone_number?: array{contains?: string, eq?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     * }|LogMessageListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|LogMessageListParams $params,
        ?RequestOptions $requestOptions = null
    ): LogMessageListResponse {
        [$parsed, $options] = LogMessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @throws APIException
     */
    public function dismiss(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageDismissResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['external_connections/log_messages/%1$s', $id],
            options: $requestOptions,
            convert: LogMessageDismissResponse::class,
        );
    }
}
