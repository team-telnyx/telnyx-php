<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Clusters\ClusterComputeResponse;
use Telnyx\AI\Clusters\ClusterGetResponse;
use Telnyx\AI\Clusters\ClusterListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ClustersContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ClustersService implements ClustersContract
{
    /**
     * @api
     */
    public ClustersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ClustersRawService($client);
    }

    /**
     * @api
     *
     * Fetch a cluster
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
    ): ClusterGetResponse {
        $params = Util::removeNulls(
            ['showSubclusters' => $showSubclusters, 'topNNodes' => $topNNodes]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($taskID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all clusters
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a cluster
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts a background task to compute how the data in an [embedded storage bucket](https://developers.telnyx.com/api-reference/embeddings/embed-documents) is clustered. This helps identify common themes and patterns in the data.
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
    ): ClusterComputeResponse {
        $params = Util::removeNulls(
            [
                'bucket' => $bucket,
                'files' => $files,
                'minClusterSize' => $minClusterSize,
                'minSubclusterSize' => $minSubclusterSize,
                'prefix' => $prefix,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->compute(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch a cluster visualization
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function fetchGraph(
        string $taskID,
        ?int $clusterID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['clusterID' => $clusterID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->fetchGraph($taskID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
