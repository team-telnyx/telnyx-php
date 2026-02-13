<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanResponse;

use Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanResponse\Data\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   description: string,
 *   runID: string,
 *   sequence: int,
 *   status: Status|value-of<Status>,
 *   stepID: string,
 *   completedAt?: \DateTimeInterface|null,
 *   metadata?: array<string,mixed>|null,
 *   parentStepID?: string|null,
 *   startedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $description;

    #[Required('run_id')]
    public string $runID;

    #[Required]
    public int $sequence;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('step_id')]
    public string $stepID;

    #[Optional('completed_at')]
    public ?\DateTimeInterface $completedAt;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    #[Optional('parent_step_id')]
    public ?string $parentStepID;

    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   description: ..., runID: ..., sequence: ..., status: ..., stepID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withDescription(...)
     *   ->withRunID(...)
     *   ->withSequence(...)
     *   ->withStatus(...)
     *   ->withStepID(...)
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
     * @param Status|value-of<Status> $status
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        string $description,
        string $runID,
        int $sequence,
        Status|string $status,
        string $stepID,
        ?\DateTimeInterface $completedAt = null,
        ?array $metadata = null,
        ?string $parentStepID = null,
        ?\DateTimeInterface $startedAt = null,
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['runID'] = $runID;
        $self['sequence'] = $sequence;
        $self['status'] = $status;
        $self['stepID'] = $stepID;

        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $parentStepID && $self['parentStepID'] = $parentStepID;
        null !== $startedAt && $self['startedAt'] = $startedAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withRunID(string $runID): self
    {
        $self = clone $this;
        $self['runID'] = $runID;

        return $self;
    }

    public function withSequence(int $sequence): self
    {
        $self = clone $this;
        $self['sequence'] = $sequence;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withStepID(string $stepID): self
    {
        $self = clone $this;
        $self['stepID'] = $stepID;

        return $self;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withParentStepID(string $parentStepID): self
    {
        $self = clone $this;
        $self['parentStepID'] = $parentStepID;

        return $self;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }
}
