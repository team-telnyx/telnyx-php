<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\RunPauseRunResponse;

use Telnyx\AI\Missions\Runs\RunPauseRunResponse\Data\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   missionID: string,
 *   runID: string,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   updatedAt: \DateTimeInterface,
 *   error?: string|null,
 *   finishedAt?: \DateTimeInterface|null,
 *   input?: array<string,mixed>|null,
 *   metadata?: array<string,mixed>|null,
 *   resultPayload?: array<string,mixed>|null,
 *   resultSummary?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('mission_id')]
    public string $missionID;

    #[Required('run_id')]
    public string $runID;

    #[Required('started_at')]
    public \DateTimeInterface $startedAt;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $error;

    #[Optional('finished_at')]
    public ?\DateTimeInterface $finishedAt;

    /** @var array<string,mixed>|null $input */
    #[Optional(map: 'mixed')]
    public ?array $input;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /** @var array<string,mixed>|null $resultPayload */
    #[Optional('result_payload', map: 'mixed')]
    public ?array $resultPayload;

    #[Optional('result_summary')]
    public ?string $resultSummary;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   missionID: ..., runID: ..., startedAt: ..., status: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withMissionID(...)
     *   ->withRunID(...)
     *   ->withStartedAt(...)
     *   ->withStatus(...)
     *   ->withUpdatedAt(...)
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
     * @param array<string,mixed>|null $input
     * @param array<string,mixed>|null $metadata
     * @param array<string,mixed>|null $resultPayload
     */
    public static function with(
        string $missionID,
        string $runID,
        \DateTimeInterface $startedAt,
        Status|string $status,
        \DateTimeInterface $updatedAt,
        ?string $error = null,
        ?\DateTimeInterface $finishedAt = null,
        ?array $input = null,
        ?array $metadata = null,
        ?array $resultPayload = null,
        ?string $resultSummary = null,
    ): self {
        $self = new self;

        $self['missionID'] = $missionID;
        $self['runID'] = $runID;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;
        $self['updatedAt'] = $updatedAt;

        null !== $error && $self['error'] = $error;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $input && $self['input'] = $input;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $resultPayload && $self['resultPayload'] = $resultPayload;
        null !== $resultSummary && $self['resultSummary'] = $resultSummary;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    public function withRunID(string $runID): self
    {
        $self = clone $this;
        $self['runID'] = $runID;

        return $self;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    /**
     * @param array<string,mixed> $input
     */
    public function withInput(array $input): self
    {
        $self = clone $this;
        $self['input'] = $input;

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

    /**
     * @param array<string,mixed> $resultPayload
     */
    public function withResultPayload(array $resultPayload): self
    {
        $self = clone $this;
        $self['resultPayload'] = $resultPayload;

        return $self;
    }

    public function withResultSummary(string $resultSummary): self
    {
        $self = clone $this;
        $self['resultSummary'] = $resultSummary;

        return $self;
    }
}
