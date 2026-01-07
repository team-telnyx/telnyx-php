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
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ClustersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ClusterRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ClusterGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        array|ClusterRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ClusterListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ClusterListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ClusterListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ClusterComputeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ClusterComputeResponse>
     *
     * @throws APIException
     */
    public function compute(
        array|ClusterComputeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ClusterFetchGraphParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function fetchGraph(
        string $taskID,
        array|ClusterFetchGraphParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
