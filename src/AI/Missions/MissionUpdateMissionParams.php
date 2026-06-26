<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions;

use Telnyx\AI\Missions\MissionUpdateMissionParams\ExecutionMode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a mission definition.
 *
 * @see Telnyx\Services\AI\MissionsService::updateMission()
 *
 * @phpstan-type MissionUpdateMissionParamsShape = array{
 *   description?: string|null,
 *   executionMode?: null|ExecutionMode|value-of<ExecutionMode>,
 *   instructions?: string|null,
 *   metadata?: array<string,mixed>|null,
 *   model?: string|null,
 *   name?: string|null,
 * }
 */
final class MissionUpdateMissionParams implements BaseModel
{
    /** @use SdkModel<MissionUpdateMissionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $description;

    /** @var value-of<ExecutionMode>|null $executionMode */
    #[Optional('execution_mode', enum: ExecutionMode::class)]
    public ?string $executionMode;

    #[Optional]
    public ?string $instructions;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    #[Optional]
    public ?string $model;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExecutionMode|value-of<ExecutionMode>|null $executionMode
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        ?string $description = null,
        ExecutionMode|string|null $executionMode = null,
        ?string $instructions = null,
        ?array $metadata = null,
        ?string $model = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $executionMode && $self['executionMode'] = $executionMode;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $model && $self['model'] = $model;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param ExecutionMode|value-of<ExecutionMode> $executionMode
     */
    public function withExecutionMode(ExecutionMode|string $executionMode): self
    {
        $self = clone $this;
        $self['executionMode'] = $executionMode;

        return $self;
    }

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

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

    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
