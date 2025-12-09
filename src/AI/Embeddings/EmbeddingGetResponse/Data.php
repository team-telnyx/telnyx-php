<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingGetResponse;

use Telnyx\AI\Embeddings\BackgroundTaskStatus;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: string|null,
 *   finishedAt?: string|null,
 *   status?: value-of<BackgroundTaskStatus>|null,
 *   taskID?: string|null,
 *   taskName?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('finished_at')]
    public ?string $finishedAt;

    /**
     * Status of an embeddings task.
     *
     * @var value-of<BackgroundTaskStatus>|null $status
     */
    #[Optional(enum: BackgroundTaskStatus::class)]
    public ?string $status;

    #[Optional('task_id')]
    public ?string $taskID;

    #[Optional('task_name')]
    public ?string $taskName;

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
        ?string $createdAt = null,
        ?string $finishedAt = null,
        BackgroundTaskStatus|string|null $status = null,
        ?string $taskID = null,
        ?string $taskName = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $finishedAt && $obj['finishedAt'] = $finishedAt;
        null !== $status && $obj['status'] = $status;
        null !== $taskID && $obj['taskID'] = $taskID;
        null !== $taskName && $obj['taskName'] = $taskName;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withFinishedAt(string $finishedAt): self
    {
        $obj = clone $this;
        $obj['finishedAt'] = $finishedAt;

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
        $obj['taskID'] = $taskID;

        return $obj;
    }

    public function withTaskName(string $taskName): self
    {
        $obj = clone $this;
        $obj['taskName'] = $taskName;

        return $obj;
    }
}
