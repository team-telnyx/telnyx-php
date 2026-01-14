<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPaginationForLogMessages;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\LogMessagesContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LogMessagesService implements LogMessagesContract
{
    /**
     * @api
     */
    public LogMessagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LogMessagesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a log message for an external connection associated with your account.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): LogMessageGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of log messages for all external connections associated with your account.
     *
     * @param Filter|FilterShape $filter Filter parameter for log messages (deepObject style). Supports filtering by external_connection_id and telephone_number with eq/contains operations.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPaginationForLogMessages<LogMessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPaginationForLogMessages {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Dismiss a log message for an external connection associated with your account.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function dismiss(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): LogMessageDismissResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->dismiss($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
