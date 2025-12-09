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
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $status && $self['status'] = $status;
        null !== $taskID && $self['taskID'] = $taskID;
        null !== $taskName && $self['taskName'] = $taskName;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withFinishedAt(?string $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    public function withStatus(string $status): self
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
}
