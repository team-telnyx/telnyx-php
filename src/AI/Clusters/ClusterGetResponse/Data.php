<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters\ClusterGetResponse;

use Telnyx\AI\Clusters\RecursiveCluster;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberAssignmentByProfile\TaskStatus;

/**
 * @phpstan-type data_alias = array{
 *   bucket: string, clusters: list<RecursiveCluster>, status: value-of<TaskStatus>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api]
    public string $bucket;

    /** @var list<RecursiveCluster> $clusters */
    #[Api(list: RecursiveCluster::class)]
    public array $clusters;

    /** @var value-of<TaskStatus> $status */
    #[Api(enum: TaskStatus::class)]
    public string $status;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(bucket: ..., clusters: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withBucket(...)->withClusters(...)->withStatus(...)
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
     * @param list<RecursiveCluster> $clusters
     * @param TaskStatus|value-of<TaskStatus> $status
     */
    public static function with(
        string $bucket,
        array $clusters,
        TaskStatus|string $status
    ): self {
        $obj = new self;

        $obj->bucket = $bucket;
        $obj->clusters = $clusters;
        $obj['status'] = $status;

        return $obj;
    }

    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }

    /**
     * @param list<RecursiveCluster> $clusters
     */
    public function withClusters(array $clusters): self
    {
        $obj = clone $this;
        $obj->clusters = $clusters;

        return $obj;
    }

    /**
     * @param TaskStatus|value-of<TaskStatus> $status
     */
    public function withStatus(TaskStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
