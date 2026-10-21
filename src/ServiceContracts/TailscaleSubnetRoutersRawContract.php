<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterCreateParams;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterDeleteResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterGetResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterNewResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterUpdateParams;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TailscaleSubnetRoutersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TailscaleSubnetRouterCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TailscaleSubnetRouterCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterGetResponse>
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
     * @param string $id identifies the resource
     * @param array<string,mixed>|TailscaleSubnetRouterUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TailscaleSubnetRouterUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TailscaleSubnetRouterListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TailscaleSubnetRouter>>
     *
     * @throws APIException
     */
    public function list(
        array|TailscaleSubnetRouterListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
