<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Page;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface LogMessagesContract
{
    /**
     * @api
     *
     * @return LogMessageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageGetResponse;

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
    ): LogMessageGetResponse;

    /**
     * @api
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
    ): LogMessageListResponse;

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
    ): LogMessageListResponse;

    /**
     * @api
     *
     * @return LogMessageDismissResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function dismiss(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageDismissResponse;

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
    ): LogMessageDismissResponse;
}
