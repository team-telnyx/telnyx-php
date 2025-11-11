<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

interface VirtualCrossConnectsContract
{
    /**
     * @api
     *
     * @param array<mixed>|VirtualCrossConnectCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VirtualCrossConnectCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|VirtualCrossConnectUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VirtualCrossConnectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|VirtualCrossConnectListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectListParams $params,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectDeleteResponse;
}
