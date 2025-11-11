<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingListResponse;

use Telnyx\AI\Embeddings\BackgroundTaskStatus;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   created_at: \DateTimeInterface,
 *   status: value-of<BackgroundTaskStatus>,
 *   task_id: string,
 *   task_name: string,
 *   user_id: string,
 *   bucket?: string|null,
 *   finished_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * Status of an embeddings task.
     *
     * @var value-of<BackgroundTaskStatus> $status
     */
    #[Api(enum: BackgroundTaskStatus::class)]
    public string $status;

    #[Api]
    public string $task_id;

    #[Api]
    public string $task_name;

    #[Api]
    public string $user_id;

    #[Api(optional: true)]
    public ?string $bucket;

    #[Api(optional: true)]
    public ?\DateTimeInterface $finished_at;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   created_at: ..., status: ..., task_id: ..., task_name: ..., user_id: ...
     * )
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
        \DateTimeInterface $created_at,
        BackgroundTaskStatus|string $status,
        string $task_id,
        string $task_name,
        string $user_id,
        ?string $bucket = null,
        ?\DateTimeInterface $finished_at = null,
    ): self {
        $obj = new self;

        $obj->created_at = $created_at;
        $obj['status'] = $status;
        $obj->task_id = $task_id;
        $obj->task_name = $task_name;
        $obj->user_id = $user_id;

        null !== $bucket && $obj->bucket = $bucket;
        null !== $finished_at && $obj->finished_at = $finished_at;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
        $obj->task_id = $taskID;

        return $obj;
    }

    public function withTaskName(string $taskName): self
    {
        $obj = clone $this;
        $obj->task_name = $taskName;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

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
        $obj->finished_at = $finishedAt;

        return $obj;
    }
}
