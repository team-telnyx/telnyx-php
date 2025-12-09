<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters\ClusterListResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberAssignmentByProfile\TaskStatus;

/**
 * @phpstan-type DataShape = array{
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
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $bucket;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('finished_at')]
    public \DateTimeInterface $finishedAt;

    #[Required('min_cluster_size')]
    public int $minClusterSize;

    #[Required('min_subcluster_size')]
    public int $minSubclusterSize;

    /** @var value-of<TaskStatus> $status */
    #[Required(enum: TaskStatus::class)]
    public string $status;

    #[Required('task_id')]
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
        $self = new self;

        $self['bucket'] = $bucket;
        $self['createdAt'] = $createdAt;
        $self['finishedAt'] = $finishedAt;
        $self['minClusterSize'] = $minClusterSize;
        $self['minSubclusterSize'] = $minSubclusterSize;
        $self['status'] = $status;
        $self['taskID'] = $taskID;

        return $self;
    }

    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    public function withMinClusterSize(int $minClusterSize): self
    {
        $self = clone $this;
        $self['minClusterSize'] = $minClusterSize;

        return $self;
    }

    public function withMinSubclusterSize(int $minSubclusterSize): self
    {
        $self = clone $this;
        $self['minSubclusterSize'] = $minSubclusterSize;

        return $self;
    }

    /**
     * @param TaskStatus|value-of<TaskStatus> $status
     */
    public function withStatus(TaskStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTaskID(string $taskID): self
    {
        $self = clone $this;
        $self['taskID'] = $taskID;

        return $self;
    }
}
