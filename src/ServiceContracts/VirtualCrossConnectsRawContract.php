<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

interface VirtualCrossConnectsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VirtualCrossConnectCreateParams $params
     *
     * @return BaseResponse<VirtualCrossConnectNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VirtualCrossConnectCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<VirtualCrossConnectGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|VirtualCrossConnectUpdateParams $params
     *
     * @return BaseResponse<VirtualCrossConnectUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VirtualCrossConnectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VirtualCrossConnectListParams $params
     *
     * @return BaseResponse<DefaultPagination<VirtualCrossConnectListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<VirtualCrossConnectDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
