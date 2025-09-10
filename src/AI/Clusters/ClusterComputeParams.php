<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ClusterComputeParams); // set properties as needed
 * $client->ai.clusters->compute(...$params->toArray());
 * ```
 * Starts a background task to compute how the data in an [embedded storage bucket](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) is clustered. This helps identify common themes and patterns in the data.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.clusters->compute(...$params->toArray());`
 *
 * @see Telnyx\AI\Clusters->compute
 *
 * @phpstan-type cluster_compute_params = array{
 *   bucket: string,
 *   files?: list<string>,
 *   minClusterSize?: int,
 *   minSubclusterSize?: int,
 *   prefix?: string,
 * }
 */
final class ClusterComputeParams implements BaseModel
{
    /** @use SdkModel<cluster_compute_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The embedded storage bucket to compute the clusters from. The bucket must already be [embedded](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding).
     */
    #[Api]
    public string $bucket;

    /**
     * Array of files to filter which are included.
     *
     * @var list<string>|null $files
     */
    #[Api(list: 'string', optional: true)]
    public ?array $files;

    /**
     * Smallest number of related text chunks to qualify as a cluster. Top-level clusters should be thought of as identifying broad themes in your data.
     */
    #[Api('min_cluster_size', optional: true)]
    public ?int $minClusterSize;

    /**
     * Smallest number of related text chunks to qualify as a sub-cluster. Sub-clusters should be thought of as identifying more specific topics within a broader theme.
     */
    #[Api('min_subcluster_size', optional: true)]
    public ?int $minSubclusterSize;

    /**
     * Prefix to filter whcih files in the buckets are included.
     */
    #[Api(optional: true)]
    public ?string $prefix;

    /**
     * `new ClusterComputeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClusterComputeParams::with(bucket: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClusterComputeParams)->withBucket(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $files
     */
    public static function with(
        string $bucket,
        ?array $files = null,
        ?int $minClusterSize = null,
        ?int $minSubclusterSize = null,
        ?string $prefix = null,
    ): self {
        $obj = new self;

        $obj->bucket = $bucket;

        null !== $files && $obj->files = $files;
        null !== $minClusterSize && $obj->minClusterSize = $minClusterSize;
        null !== $minSubclusterSize && $obj->minSubclusterSize = $minSubclusterSize;
        null !== $prefix && $obj->prefix = $prefix;

        return $obj;
    }

    /**
     * The embedded storage bucket to compute the clusters from. The bucket must already be [embedded](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding).
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }

    /**
     * Array of files to filter which are included.
     *
     * @param list<string> $files
     */
    public function withFiles(array $files): self
    {
        $obj = clone $this;
        $obj->files = $files;

        return $obj;
    }

    /**
     * Smallest number of related text chunks to qualify as a cluster. Top-level clusters should be thought of as identifying broad themes in your data.
     */
    public function withMinClusterSize(int $minClusterSize): self
    {
        $obj = clone $this;
        $obj->minClusterSize = $minClusterSize;

        return $obj;
    }

    /**
     * Smallest number of related text chunks to qualify as a sub-cluster. Sub-clusters should be thought of as identifying more specific topics within a broader theme.
     */
    public function withMinSubclusterSize(int $minSubclusterSize): self
    {
        $obj = clone $this;
        $obj->minSubclusterSize = $minSubclusterSize;

        return $obj;
    }

    /**
     * Prefix to filter whcih files in the buckets are included.
     */
    public function withPrefix(string $prefix): self
    {
        $obj = clone $this;
        $obj->prefix = $prefix;

        return $obj;
    }
}
