<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\MissionUpdateMissionResponse;

use Telnyx\AI\Missions\MissionUpdateMissionResponse\Data\ExecutionMode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt: \DateTimeInterface,
 *   executionMode: ExecutionMode|value-of<ExecutionMode>,
 *   missionID: string,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   description?: string|null,
 *   instructions?: string|null,
 *   metadata?: array<string,mixed>|null,
 *   model?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var value-of<ExecutionMode> $executionMode */
    #[Required('execution_mode', enum: ExecutionMode::class)]
    public string $executionMode;

    #[Required('mission_id')]
    public string $missionID;

    #[Required]
    public string $name;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $instructions;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    #[Optional]
    public ?string $model;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   createdAt: ..., executionMode: ..., missionID: ..., name: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withCreatedAt(...)
     *   ->withExecutionMode(...)
     *   ->withMissionID(...)
     *   ->withName(...)
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
     * @param ExecutionMode|value-of<ExecutionMode> $executionMode
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        \DateTimeInterface $createdAt,
        ExecutionMode|string $executionMode,
        string $missionID,
        string $name,
        \DateTimeInterface $updatedAt,
        ?string $description = null,
        ?string $instructions = null,
        ?array $metadata = null,
        ?string $model = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['executionMode'] = $executionMode;
        $self['missionID'] = $missionID;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;

        null !== $description && $self['description'] = $description;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $model && $self['model'] = $model;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

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
}
