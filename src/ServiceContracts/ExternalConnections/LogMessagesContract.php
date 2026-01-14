<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPaginationForLogMessages;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LogMessagesContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): LogMessageGetResponse;

    /**
     * @api
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
    ): DefaultPaginationForLogMessages;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function dismiss(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): LogMessageDismissResponse;
}
