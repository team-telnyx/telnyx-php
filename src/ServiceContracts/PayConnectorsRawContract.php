<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\PayConnectors\PayConnector;
use Telnyx\PayConnectors\PayConnectorCreateParams;
use Telnyx\PayConnectors\PayConnectorListParams;
use Telnyx\PayConnectors\PayConnectorResponse;
use Telnyx\PayConnectors\PayConnectorUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PayConnectorsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PayConnectorCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayConnectorResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PayConnectorCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayConnectorResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param array<string,mixed>|PayConnectorUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayConnectorResponse>
     *
     * @throws APIException
     */
    public function update(
        string $name,
        array|PayConnectorUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PayConnectorListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBracketCursorPagination<PayConnector>>
     *
     * @throws APIException
     */
    public function list(
        array|PayConnectorListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
