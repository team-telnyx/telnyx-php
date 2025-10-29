<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: string,
 *   finishedAt?: string|null,
 *   status?: string,
 *   taskID?: string,
 *   taskName?: string,
 *   userID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    #[Api('finished_at', nullable: true, optional: true)]
    public ?string $finishedAt;

    #[Api(optional: true)]
    public ?string $status;

    #[Api('task_id', optional: true)]
    public ?string $taskID;

    #[Api('task_name', optional: true)]
    public ?string $taskName;

    #[Api('user_id', optional: true)]
    public ?string $userID;

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
        ?string $createdAt = null,
        ?string $finishedAt = null,
        ?string $status = null,
        ?string $taskID = null,
        ?string $taskName = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $finishedAt && $obj->finishedAt = $finishedAt;
        null !== $status && $obj->status = $status;
        null !== $taskID && $obj->taskID = $taskID;
        null !== $taskName && $obj->taskName = $taskName;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withFinishedAt(?string $finishedAt): self
    {
        $obj = clone $this;
        $obj->finishedAt = $finishedAt;

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
}
