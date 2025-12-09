<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Clusters\ClusterComputeParams;
use Telnyx\AI\Clusters\ClusterComputeResponse;
use Telnyx\AI\Clusters\ClusterFetchGraphParams;
use Telnyx\AI\Clusters\ClusterGetResponse;
use Telnyx\AI\Clusters\ClusterListParams;
use Telnyx\AI\Clusters\ClusterListResponse;
use Telnyx\AI\Clusters\ClusterRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ClustersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ClusterRetrieveParams $params
     *
     * @return BaseResponse<ClusterGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        array|ClusterRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ClusterListParams $params
     *
     * @return BaseResponse<ClusterListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ClusterListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ClusterComputeParams $params
     *
     * @return BaseResponse<ClusterComputeResponse>
     *
     * @throws APIException
     */
    public function compute(
        array|ClusterComputeParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ClusterFetchGraphParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function fetchGraph(
        string $taskID,
        array|ClusterFetchGraphParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
