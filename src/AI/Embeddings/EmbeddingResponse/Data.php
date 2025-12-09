<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: string|null,
 *   finishedAt?: string|null,
 *   status?: string|null,
 *   taskID?: string|null,
 *   taskName?: string|null,
 *   userID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('finished_at', nullable: true)]
    public ?string $finishedAt;

    #[Optional]
    public ?string $status;

    #[Optional('task_id')]
    public ?string $taskID;

    #[Optional('task_name')]
    public ?string $taskName;

    #[Optional('user_id')]
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

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $finishedAt && $obj['finishedAt'] = $finishedAt;
        null !== $status && $obj['status'] = $status;
        null !== $taskID && $obj['taskID'] = $taskID;
        null !== $taskName && $obj['taskName'] = $taskName;
        null !== $userID && $obj['userID'] = $userID;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withFinishedAt(?string $finishedAt): self
    {
        $obj = clone $this;
        $obj['finishedAt'] = $finishedAt;

        return $obj;
    }

    public function withStatus(string $status): self
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

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
