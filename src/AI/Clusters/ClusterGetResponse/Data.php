<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters\ClusterGetResponse;

use Telnyx\AI\Clusters\RecursiveCluster;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\TaskStatus;

/**
 * @phpstan-type DataShape = array{
 *   bucket: string, clusters: list<mixed>, status: TaskStatus|value-of<TaskStatus>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $bucket;

    /** @var list<mixed> $clusters */
    #[Required(list: RecursiveCluster::class)]
    public array $clusters;

    /** @var value-of<TaskStatus> $status */
    #[Required(enum: TaskStatus::class)]
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
     * @param list<mixed> $clusters
     * @param TaskStatus|value-of<TaskStatus> $status
     */
    public static function with(
        string $bucket,
        array $clusters,
        TaskStatus|string $status
    ): self {
        $self = new self;

        $self['bucket'] = $bucket;
        $self['clusters'] = $clusters;
        $self['status'] = $status;

        return $self;
    }

    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    /**
     * @param list<mixed> $clusters
     */
    public function withClusters(array $clusters): self
    {
        $self = clone $this;
        $self['clusters'] = $clusters;

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
}
