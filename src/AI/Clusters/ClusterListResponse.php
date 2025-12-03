<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumberAssignmentByProfile\TaskStatus;

/**
 * @phpstan-type ClusterListResponseShape = array{
 *   bucket: string,
 *   created_at: \DateTimeInterface,
 *   finished_at: \DateTimeInterface,
 *   min_cluster_size: int,
 *   min_subcluster_size: int,
 *   status: value-of<TaskStatus>,
 *   task_id: string,
 * }
 */
final class ClusterListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ClusterListResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $bucket;

    #[Api]
    public \DateTimeInterface $created_at;

    #[Api]
    public \DateTimeInterface $finished_at;

    #[Api]
    public int $min_cluster_size;

    #[Api]
    public int $min_subcluster_size;

    /** @var value-of<TaskStatus> $status */
    #[Api(enum: TaskStatus::class)]
    public string $status;

    #[Api]
    public string $task_id;

    /**
     * `new ClusterListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClusterListResponse::with(
     *   bucket: ...,
     *   created_at: ...,
     *   finished_at: ...,
     *   min_cluster_size: ...,
     *   min_subcluster_size: ...,
     *   status: ...,
     *   task_id: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClusterListResponse)
     *   ->withBucket(...)
     *   ->withCreatedAt(...)
     *   ->withFinishedAt(...)
     *   ->withMinClusterSize(...)
     *   ->withMinSubclusterSize(...)
     *   ->withStatus(...)
     *   ->withTaskID(...)
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
     * @param TaskStatus|value-of<TaskStatus> $status
     */
    public static function with(
        string $bucket,
        \DateTimeInterface $created_at,
        \DateTimeInterface $finished_at,
        int $min_cluster_size,
        int $min_subcluster_size,
        TaskStatus|string $status,
        string $task_id,
    ): self {
        $obj = new self;

        $obj->bucket = $bucket;
        $obj->created_at = $created_at;
        $obj->finished_at = $finished_at;
        $obj->min_cluster_size = $min_cluster_size;
        $obj->min_subcluster_size = $min_subcluster_size;
        $obj['status'] = $status;
        $obj->task_id = $task_id;

        return $obj;
    }

    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj->finished_at = $finishedAt;

        return $obj;
    }

    public function withMinClusterSize(int $minClusterSize): self
    {
        $obj = clone $this;
        $obj->min_cluster_size = $minClusterSize;

        return $obj;
    }

    public function withMinSubclusterSize(int $minSubclusterSize): self
    {
        $obj = clone $this;
        $obj->min_subcluster_size = $minSubclusterSize;

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

    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj->task_id = $taskID;

        return $obj;
    }
}
