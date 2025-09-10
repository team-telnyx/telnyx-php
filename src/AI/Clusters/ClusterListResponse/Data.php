<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters\ClusterListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberAssignmentByProfile\TaskStatus;

/**
 * @phpstan-type data_alias = array{
 *   bucket: string,
 *   createdAt: \DateTimeInterface,
 *   finishedAt: \DateTimeInterface,
 *   minClusterSize: int,
 *   minSubclusterSize: int,
 *   status: value-of<TaskStatus>,
 *   taskID: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api]
    public string $bucket;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api('finished_at')]
    public \DateTimeInterface $finishedAt;

    #[Api('min_cluster_size')]
    public int $minClusterSize;

    #[Api('min_subcluster_size')]
    public int $minSubclusterSize;

    /** @var value-of<TaskStatus> $status */
    #[Api(enum: TaskStatus::class)]
    public string $status;

    #[Api('task_id')]
    public string $taskID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   bucket: ...,
     *   createdAt: ...,
     *   finishedAt: ...,
     *   minClusterSize: ...,
     *   minSubclusterSize: ...,
     *   status: ...,
     *   taskID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
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
        \DateTimeInterface $createdAt,
        \DateTimeInterface $finishedAt,
        int $minClusterSize,
        int $minSubclusterSize,
        TaskStatus|string $status,
        string $taskID,
    ): self {
        $obj = new self;

        $obj->bucket = $bucket;
        $obj->createdAt = $createdAt;
        $obj->finishedAt = $finishedAt;
        $obj->minClusterSize = $minClusterSize;
        $obj->minSubclusterSize = $minSubclusterSize;
        $obj->status = $status instanceof TaskStatus ? $status->value : $status;
        $obj->taskID = $taskID;

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
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj->finishedAt = $finishedAt;

        return $obj;
    }

    public function withMinClusterSize(int $minClusterSize): self
    {
        $obj = clone $this;
        $obj->minClusterSize = $minClusterSize;

        return $obj;
    }

    public function withMinSubclusterSize(int $minSubclusterSize): self
    {
        $obj = clone $this;
        $obj->minSubclusterSize = $minSubclusterSize;

        return $obj;
    }

    /**
     * @param TaskStatus|value-of<TaskStatus> $status
     */
    public function withStatus(TaskStatus|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof TaskStatus ? $status->value : $status;

        return $obj;
    }

    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj->taskID = $taskID;

        return $obj;
    }
}
