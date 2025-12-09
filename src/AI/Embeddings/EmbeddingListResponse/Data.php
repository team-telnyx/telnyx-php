<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingListResponse;

use Telnyx\AI\Embeddings\BackgroundTaskStatus;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt: \DateTimeInterface,
 *   status: value-of<BackgroundTaskStatus>,
 *   taskID: string,
 *   taskName: string,
 *   userID: string,
 *   bucket?: string|null,
 *   finishedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Status of an embeddings task.
     *
     * @var value-of<BackgroundTaskStatus> $status
     */
    #[Required(enum: BackgroundTaskStatus::class)]
    public string $status;

    #[Required('task_id')]
    public string $taskID;

    #[Required('task_name')]
    public string $taskName;

    #[Required('user_id')]
    public string $userID;

    #[Optional]
    public ?string $bucket;

    #[Optional('finished_at')]
    public ?\DateTimeInterface $finishedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(createdAt: ..., status: ..., taskID: ..., taskName: ..., userID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withCreatedAt(...)
     *   ->withStatus(...)
     *   ->withTaskID(...)
     *   ->withTaskName(...)
     *   ->withUserID(...)
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
     * @param BackgroundTaskStatus|value-of<BackgroundTaskStatus> $status
     */
    public static function with(
        \DateTimeInterface $createdAt,
        BackgroundTaskStatus|string $status,
        string $taskID,
        string $taskName,
        string $userID,
        ?string $bucket = null,
        ?\DateTimeInterface $finishedAt = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['status'] = $status;
        $self['taskID'] = $taskID;
        $self['taskName'] = $taskName;
        $self['userID'] = $userID;

        null !== $bucket && $self['bucket'] = $bucket;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Status of an embeddings task.
     *
     * @param BackgroundTaskStatus|value-of<BackgroundTaskStatus> $status
     */
    public function withStatus(BackgroundTaskStatus|string $status): self
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

    public function withTaskName(string $taskName): self
    {
        $self = clone $this;
        $self['taskName'] = $taskName;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }
}
