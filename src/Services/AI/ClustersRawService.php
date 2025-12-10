<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Clusters\ClusterComputeParams;
use Telnyx\AI\Clusters\ClusterComputeResponse;
use Telnyx\AI\Clusters\ClusterFetchGraphParams;
use Telnyx\AI\Clusters\ClusterGetResponse;
use Telnyx\AI\Clusters\ClusterListParams;
use Telnyx\AI\Clusters\ClusterListResponse;
use Telnyx\AI\Clusters\ClusterRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ClustersRawContract;

final class ClustersRawService implements ClustersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Fetch a cluster
     *
     * @param array{
     *   showSubclusters?: bool, topNNodes?: int
     * }|ClusterRetrieveParams $params
     *
     * @return BaseResponse<ClusterGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        array|ClusterRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ClusterRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/clusters/%1$s', $taskID],
            query: Util::array_transform_keys(
                $parsed,
                ['showSubclusters' => 'show_subclusters', 'topNNodes' => 'top_n_nodes'],
            ),
            options: $options,
            convert: ClusterGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all clusters
     *
     * @param array{page?: array{number?: int, size?: int}}|ClusterListParams $params
     *
     * @return BaseResponse<ClusterListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ClusterListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ClusterListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/clusters',
            query: $parsed,
            options: $options,
            convert: ClusterListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a cluster
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/clusters/%1$s', $taskID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Starts a background task to compute how the data in an [embedded storage bucket](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) is clustered. This helps identify common themes and patterns in the data.
     *
     * @param array{
     *   bucket: string,
     *   files?: list<string>,
     *   minClusterSize?: int,
     *   minSubclusterSize?: int,
     *   prefix?: string,
     * }|ClusterComputeParams $params
     *
     * @return BaseResponse<ClusterComputeResponse>
     *
     * @throws APIException
     */
    public function compute(
        array|ClusterComputeParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ClusterComputeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/clusters',
            body: (object) $parsed,
            options: $options,
            convert: ClusterComputeResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch a cluster visualization
     *
     * @param array{clusterID?: int}|ClusterFetchGraphParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function fetchGraph(
        string $taskID,
        array|ClusterFetchGraphParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ClusterFetchGraphParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/clusters/%1$s/graph', $taskID],
            query: Util::array_transform_keys($parsed, ['clusterID' => 'cluster_id']),
            headers: ['Accept' => 'image/png'],
            options: $options,
            convert: 'string',
        );
    }
}
