<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingListResponse;

use Telnyx\AI\Embeddings\BackgroundTaskStatus;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt: \DateTimeInterface,
 *   status: value-of<BackgroundTaskStatus>,
 *   taskID: string,
 *   taskName: string,
 *   userID: string,
 *   bucket?: string,
 *   finishedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Status of an embeddings task.
     *
     * @var value-of<BackgroundTaskStatus> $status
     */
    #[Api(enum: BackgroundTaskStatus::class)]
    public string $status;

    #[Api('task_id')]
    public string $taskID;

    #[Api('task_name')]
    public string $taskName;

    #[Api('user_id')]
    public string $userID;

    #[Api(optional: true)]
    public ?string $bucket;

    #[Api('finished_at', optional: true)]
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
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj['status'] = $status;
        $obj->taskID = $taskID;
        $obj->taskName = $taskName;
        $obj->userID = $userID;

        null !== $bucket && $obj->bucket = $bucket;
        null !== $finishedAt && $obj->finishedAt = $finishedAt;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Status of an embeddings task.
     *
     * @param BackgroundTaskStatus|value-of<BackgroundTaskStatus> $status
     */
    public function withStatus(BackgroundTaskStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj->taskID = $taskID;

        return $obj;
    }

    public function withTaskName(string $taskName): self
    {
        $obj = clone $this;
        $obj->taskName = $taskName;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }

    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj->finishedAt = $finishedAt;

        return $obj;
    }
}
