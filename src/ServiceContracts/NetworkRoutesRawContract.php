<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NetworkRoutes\NetworkRouteCreateParams;
use Telnyx\NetworkRoutes\NetworkRouteGetResponse;
use Telnyx\NetworkRoutes\NetworkRouteListParams;
use Telnyx\NetworkRoutes\NetworkRouteListResponse;
use Telnyx\NetworkRoutes\NetworkRouteNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NetworkRoutesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NetworkRouteCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkRouteNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NetworkRouteCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkRouteGetResponse>
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
     * @param array<string,mixed>|NetworkRouteListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkRouteListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkRouteListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
