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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ClustersContract
{
    /**
     * @api
     *
     * @param array<mixed>|ClusterRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        array|ClusterRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ClusterGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ClusterListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ClusterListParams $params,
        ?RequestOptions $requestOptions = null
    ): ClusterListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ClusterComputeParams $params
     *
     * @throws APIException
     */
    public function compute(
        array|ClusterComputeParams $params,
        ?RequestOptions $requestOptions = null
    ): ClusterComputeResponse;

    /**
     * @api
     *
     * @param array<mixed>|ClusterFetchGraphParams $params
     *
     * @throws APIException
     */
    public function fetchGraph(
        string $taskID,
        array|ClusterFetchGraphParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;
}
