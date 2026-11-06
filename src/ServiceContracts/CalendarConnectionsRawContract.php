<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CalendarConnections\CalendarConnectionCreateParams;
use Telnyx\CalendarConnections\CalendarConnectionListResponse;
use Telnyx\CalendarConnections\CalendarConnectionNewResponse;
use Telnyx\CalendarConnections\CalendarConnectionResponse;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams;
use Telnyx\CalendarConnections\CalendarConnectionUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CalendarConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CalendarConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CalendarConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id calendar connection ID
     * @param array<string,mixed>|CalendarConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CalendarConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
