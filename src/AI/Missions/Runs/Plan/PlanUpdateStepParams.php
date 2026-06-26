<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\AI\Missions\Runs\Plan\PlanUpdateStepParams\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the status of a plan step.
 *
 * @see Telnyx\Services\AI\Missions\Runs\PlanService::updateStep()
 *
 * @phpstan-type PlanUpdateStepParamsShape = array{
 *   missionID: string,
 *   runID: string,
 *   metadata?: array<string,mixed>|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class PlanUpdateStepParams implements BaseModel
{
    /** @use SdkModel<PlanUpdateStepParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    #[Required]
    public string $runID;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * `new PlanUpdateStepParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanUpdateStepParams::with(missionID: ..., runID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanUpdateStepParams)->withMissionID(...)->withRunID(...)
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
     * @param array<string,mixed>|null $metadata
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        string $missionID,
        string $runID,
        ?array $metadata = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        $self['missionID'] = $missionID;
        $self['runID'] = $runID;

        null !== $metadata && $self['metadata'] = $metadata;
        null !== $status && $self['status'] = $status;

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
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
