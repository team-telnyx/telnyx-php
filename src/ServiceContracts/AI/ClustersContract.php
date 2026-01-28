<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Clusters\ClusterComputeResponse;
use Telnyx\AI\Clusters\ClusterGetResponse;
use Telnyx\AI\Clusters\ClusterListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ClustersContract
{
    /**
     * @api
     *
     * @param bool $showSubclusters whether or not to include subclusters and their nodes in the response
     * @param int $topNNodes The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        bool $showSubclusters = false,
        int $topNNodes = 0,
        RequestOptions|array|null $requestOptions = null,
    ): ClusterGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ClusterListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $bucket The embedded storage bucket to compute the clusters from. The bucket must already be [embedded](https://developers.telnyx.com/api-reference/embeddings/embed-documents).
     * @param list<string> $files array of files to filter which are included
     * @param int $minClusterSize Smallest number of related text chunks to qualify as a cluster. Top-level clusters should be thought of as identifying broad themes in your data.
     * @param int $minSubclusterSize Smallest number of related text chunks to qualify as a sub-cluster. Sub-clusters should be thought of as identifying more specific topics within a broader theme.
     * @param string $prefix prefix to filter whcih files in the buckets are included
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function compute(
        string $bucket,
        ?array $files = null,
        int $minClusterSize = 25,
        int $minSubclusterSize = 5,
        ?string $prefix = null,
        RequestOptions|array|null $requestOptions = null,
    ): ClusterComputeResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function fetchGraph(
        string $taskID,
        ?int $clusterID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
