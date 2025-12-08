<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingGetResponse;

use Telnyx\AI\Embeddings\BackgroundTaskStatus;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   created_at?: string|null,
 *   finished_at?: string|null,
 *   status?: value-of<BackgroundTaskStatus>|null,
 *   task_id?: string|null,
 *   task_name?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $created_at;

    #[Optional]
    public ?string $finished_at;

    /**
     * Status of an embeddings task.
     *
     * @var value-of<BackgroundTaskStatus>|null $status
     */
    #[Optional(enum: BackgroundTaskStatus::class)]
    public ?string $status;

    #[Optional]
    public ?string $task_id;

    #[Optional]
    public ?string $task_name;

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
        ?string $created_at = null,
        ?string $finished_at = null,
        BackgroundTaskStatus|string|null $status = null,
        ?string $task_id = null,
        ?string $task_name = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $finished_at && $obj['finished_at'] = $finished_at;
        null !== $status && $obj['status'] = $status;
        null !== $task_id && $obj['task_id'] = $task_id;
        null !== $task_name && $obj['task_name'] = $task_name;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withFinishedAt(string $finishedAt): self
    {
        $obj = clone $this;
        $obj['finished_at'] = $finishedAt;

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
        $obj['task_id'] = $taskID;

        return $obj;
    }

    public function withTaskName(string $taskName): self
    {
        $obj = clone $this;
        $obj['task_name'] = $taskName;

        return $obj;
    }
}
