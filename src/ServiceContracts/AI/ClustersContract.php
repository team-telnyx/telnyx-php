<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Clusters\ClusterComputeResponse;
use Telnyx\AI\Clusters\ClusterGetResponse;
use Telnyx\AI\Clusters\ClusterListParams\Page;
use Telnyx\AI\Clusters\ClusterListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ClustersContract
{
    /**
     * @api
     *
     * @param bool $showSubclusters whether or not to include subclusters and their nodes in the response
     * @param int $topNNodes The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     */
    public function retrieve(
        string $taskID,
        $showSubclusters = omit,
        $topNNodes = omit,
        ?RequestOptions $requestOptions = null,
    ): ClusterGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ClusterListResponse;

    /**
     * @api
     */
    public function delete(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $bucket The embedded storage bucket to compute the clusters from. The bucket must already be [embedded](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding).
     * @param list<string> $files array of files to filter which are included
     * @param int $minClusterSize Smallest number of related text chunks to qualify as a cluster. Top-level clusters should be thought of as identifying broad themes in your data.
     * @param int $minSubclusterSize Smallest number of related text chunks to qualify as a sub-cluster. Sub-clusters should be thought of as identifying more specific topics within a broader theme.
     * @param string $prefix prefix to filter whcih files in the buckets are included
     */
    public function compute(
        $bucket,
        $files = omit,
        $minClusterSize = omit,
        $minSubclusterSize = omit,
        $prefix = omit,
        ?RequestOptions $requestOptions = null,
    ): ClusterComputeResponse;

    /**
     * @api
     *
     * @param int $clusterID
     */
    public function fetchGraph(
        string $taskID,
        $clusterID = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
