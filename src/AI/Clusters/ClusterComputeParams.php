<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Starts a background task to compute how the data in an [embedded storage bucket](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) is clustered. This helps identify common themes and patterns in the data.
 *
 * @see Telnyx\Services\AI\ClustersService::compute()
 *
 * @phpstan-type ClusterComputeParamsShape = array{
 *   bucket: string,
 *   files?: list<string>,
 *   min_cluster_size?: int,
 *   min_subcluster_size?: int,
 *   prefix?: string,
 * }
 */
final class ClusterComputeParams implements BaseModel
{
    /** @use SdkModel<ClusterComputeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The embedded storage bucket to compute the clusters from. The bucket must already be [embedded](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding).
     */
    #[Required]
    public string $bucket;

    /**
     * Array of files to filter which are included.
     *
     * @var list<string>|null $files
     */
    #[Optional(list: 'string')]
    public ?array $files;

    /**
     * Smallest number of related text chunks to qualify as a cluster. Top-level clusters should be thought of as identifying broad themes in your data.
     */
    #[Optional]
    public ?int $min_cluster_size;

    /**
     * Smallest number of related text chunks to qualify as a sub-cluster. Sub-clusters should be thought of as identifying more specific topics within a broader theme.
     */
    #[Optional]
    public ?int $min_subcluster_size;

    /**
     * Prefix to filter whcih files in the buckets are included.
     */
    #[Optional]
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
        ?int $min_cluster_size = null,
        ?int $min_subcluster_size = null,
        ?string $prefix = null,
    ): self {
        $obj = new self;

        $obj['bucket'] = $bucket;

        null !== $files && $obj['files'] = $files;
        null !== $min_cluster_size && $obj['min_cluster_size'] = $min_cluster_size;
        null !== $min_subcluster_size && $obj['min_subcluster_size'] = $min_subcluster_size;
        null !== $prefix && $obj['prefix'] = $prefix;

        return $obj;
    }

    /**
     * The embedded storage bucket to compute the clusters from. The bucket must already be [embedded](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding).
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj['bucket'] = $bucket;

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
        $obj['files'] = $files;

        return $obj;
    }

    /**
     * Smallest number of related text chunks to qualify as a cluster. Top-level clusters should be thought of as identifying broad themes in your data.
     */
    public function withMinClusterSize(int $minClusterSize): self
    {
        $obj = clone $this;
        $obj['min_cluster_size'] = $minClusterSize;

        return $obj;
    }

    /**
     * Smallest number of related text chunks to qualify as a sub-cluster. Sub-clusters should be thought of as identifying more specific topics within a broader theme.
     */
    public function withMinSubclusterSize(int $minSubclusterSize): self
    {
        $obj = clone $this;
        $obj['min_subcluster_size'] = $minSubclusterSize;

        return $obj;
    }

    /**
     * Prefix to filter whcih files in the buckets are included.
     */
    public function withPrefix(string $prefix): self
    {
        $obj = clone $this;
        $obj['prefix'] = $prefix;

        return $obj;
    }
}
