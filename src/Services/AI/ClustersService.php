<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Clusters\ClusterComputeParams;
use Telnyx\AI\Clusters\ClusterComputeResponse;
use Telnyx\AI\Clusters\ClusterFetchGraphParams;
use Telnyx\AI\Clusters\ClusterGetResponse;
use Telnyx\AI\Clusters\ClusterListParams;
use Telnyx\AI\Clusters\ClusterListParams\Page;
use Telnyx\AI\Clusters\ClusterListResponse;
use Telnyx\AI\Clusters\ClusterRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ClustersContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param bool $showSubclusters whether or not to include subclusters and their nodes in the response
     * @param int $topNNodes The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     *
     * @return ClusterGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $taskID,
        $showSubclusters = omit,
        $topNNodes = omit,
        ?RequestOptions $requestOptions = null,
    ): ClusterGetResponse {
        [$parsed, $options] = ClusterRetrieveParams::parseRequest(
            ['showSubclusters' => $showSubclusters, 'topNNodes' => $topNNodes],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/clusters/%1$s', $taskID],
            query: $parsed,
            options: $options,
            convert: ClusterGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all clusters
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return ClusterListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ClusterListResponse {
        [$parsed, $options] = ClusterListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     */
    public function delete(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
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
     * @param string $bucket The embedded storage bucket to compute the clusters from. The bucket must already be [embedded](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding).
     * @param list<string> $files array of files to filter which are included
     * @param int $minClusterSize Smallest number of related text chunks to qualify as a cluster. Top-level clusters should be thought of as identifying broad themes in your data.
     * @param int $minSubclusterSize Smallest number of related text chunks to qualify as a sub-cluster. Sub-clusters should be thought of as identifying more specific topics within a broader theme.
     * @param string $prefix prefix to filter whcih files in the buckets are included
     *
     * @return ClusterComputeResponse<HasRawResponse>
     */
    public function compute(
        $bucket,
        $files = omit,
        $minClusterSize = omit,
        $minSubclusterSize = omit,
        $prefix = omit,
        ?RequestOptions $requestOptions = null,
    ): ClusterComputeResponse {
        [$parsed, $options] = ClusterComputeParams::parseRequest(
            [
                'bucket' => $bucket,
                'files' => $files,
                'minClusterSize' => $minClusterSize,
                'minSubclusterSize' => $minSubclusterSize,
                'prefix' => $prefix,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param int $clusterID
     */
    public function fetchGraph(
        string $taskID,
        $clusterID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ClusterFetchGraphParams::parseRequest(
            ['clusterID' => $clusterID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/clusters/%1$s/graph', $taskID],
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }
}
