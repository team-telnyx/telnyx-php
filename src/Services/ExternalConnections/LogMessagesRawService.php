<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPaginationForLogMessages;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\LogMessagesRawContract;

final class LogMessagesRawService implements LogMessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a log message for an external connection associated with your account.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<LogMessageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     *     externalConnectionID?: string,
     *     telephoneNumber?: array{contains?: string, eq?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     * }|LogMessageListParams $params
     *
     * @return BaseResponse<DefaultPaginationForLogMessages<LogMessageListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|LogMessageListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
            page: DefaultPaginationForLogMessages::class,
        );
    }

    /**
     * @api
     *
     * Dismiss a log message for an external connection associated with your account.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<LogMessageDismissResponse>
     *
     * @throws APIException
     */
    public function dismiss(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['external_connections/log_messages/%1$s', $id],
            options: $requestOptions,
            convert: LogMessageDismissResponse::class,
        );
    }
}
