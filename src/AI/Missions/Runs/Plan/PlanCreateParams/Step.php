<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan\PlanCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StepShape = array{
 *   description: string,
 *   sequence: int,
 *   stepID: string,
 *   metadata?: array<string,mixed>|null,
 *   parentStepID?: string|null,
 * }
 */
final class Step implements BaseModel
{
    /** @use SdkModel<StepShape> */
    use SdkModel;

    #[Required]
    public string $description;

    #[Required]
    public int $sequence;

    #[Required('step_id')]
    public string $stepID;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    #[Optional('parent_step_id')]
    public ?string $parentStepID;

    /**
     * `new Step()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Step::with(description: ..., sequence: ..., stepID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Step)->withDescription(...)->withSequence(...)->withStepID(...)
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
     */
    public static function with(
        string $description,
        int $sequence,
        string $stepID,
        ?array $metadata = null,
        ?string $parentStepID = null,
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['sequence'] = $sequence;
        $self['stepID'] = $stepID;

        null !== $metadata && $self['metadata'] = $metadata;
        null !== $parentStepID && $self['parentStepID'] = $parentStepID;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withSequence(int $sequence): self
    {
        $self = clone $this;
        $self['sequence'] = $sequence;

        return $self;
    }

    public function withStepID(string $stepID): self
    {
        $self = clone $this;
        $self['stepID'] = $stepID;

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
}
