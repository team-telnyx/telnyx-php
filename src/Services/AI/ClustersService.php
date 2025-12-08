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
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ClustersContract;

final class ClustersService implements ClustersContract
{
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
     *   show_subclusters?: bool, top_n_nodes?: int
     * }|ClusterRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        array|ClusterRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ClusterGetResponse {
        [$parsed, $options] = ClusterRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ClusterGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/clusters/%1$s', $taskID],
            query: $parsed,
            options: $options,
            convert: ClusterGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all clusters
     *
     * @param array{page?: array{number?: int, size?: int}}|ClusterListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ClusterListParams $params,
        ?RequestOptions $requestOptions = null
    ): ClusterListResponse {
        [$parsed, $options] = ClusterListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ClusterListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'ai/clusters',
            query: $parsed,
            options: $options,
            convert: ClusterListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a cluster
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['ai/clusters/%1$s', $taskID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts a background task to compute how the data in an [embedded storage bucket](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) is clustered. This helps identify common themes and patterns in the data.
     *
     * @param array{
     *   bucket: string,
     *   files?: list<string>,
     *   min_cluster_size?: int,
     *   min_subcluster_size?: int,
     *   prefix?: string,
     * }|ClusterComputeParams $params
     *
     * @throws APIException
     */
    public function compute(
        array|ClusterComputeParams $params,
        ?RequestOptions $requestOptions = null
    ): ClusterComputeResponse {
        [$parsed, $options] = ClusterComputeParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ClusterComputeResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'ai/clusters',
            body: (object) $parsed,
            options: $options,
            convert: ClusterComputeResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch a cluster visualization
     *
     * @param array{cluster_id?: int}|ClusterFetchGraphParams $params
     *
     * @throws APIException
     */
    public function fetchGraph(
        string $taskID,
        array|ClusterFetchGraphParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = ClusterFetchGraphParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<string> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/clusters/%1$s/graph', $taskID],
            query: $parsed,
            headers: ['Accept' => 'image/png'],
            options: $options,
            convert: 'string',
        );

        return $response->parse();
    }
}
