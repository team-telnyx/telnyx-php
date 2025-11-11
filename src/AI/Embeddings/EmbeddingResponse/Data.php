<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   created_at?: string|null,
 *   finished_at?: string|null,
 *   status?: string|null,
 *   task_id?: string|null,
 *   task_name?: string|null,
 *   user_id?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $created_at;

    #[Api(nullable: true, optional: true)]
    public ?string $finished_at;

    #[Api(optional: true)]
    public ?string $status;

    #[Api(optional: true)]
    public ?string $task_id;

    #[Api(optional: true)]
    public ?string $task_name;

    #[Api(optional: true)]
    public ?string $user_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $created_at = null,
        ?string $finished_at = null,
        ?string $status = null,
        ?string $task_id = null,
        ?string $task_name = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $finished_at && $obj->finished_at = $finished_at;
        null !== $status && $obj->status = $status;
        null !== $task_id && $obj->task_id = $task_id;
        null !== $task_name && $obj->task_name = $task_name;
        null !== $user_id && $obj->user_id = $user_id;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withFinishedAt(?string $finishedAt): self
    {
        $obj = clone $this;
        $obj->finished_at = $finishedAt;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

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
}
