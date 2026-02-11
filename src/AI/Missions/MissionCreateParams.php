<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions;

use Telnyx\AI\Missions\MissionCreateParams\ExecutionMode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new mission definition.
 *
 * @see Telnyx\Services\AI\MissionsService::create()
 *
 * @phpstan-type MissionCreateParamsShape = array{
 *   name: string,
 *   description?: string|null,
 *   executionMode?: null|ExecutionMode|value-of<ExecutionMode>,
 *   instructions?: string|null,
 *   metadata?: array<string,mixed>|null,
 *   model?: string|null,
 * }
 */
final class MissionCreateParams implements BaseModel
{
    /** @use SdkModel<MissionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

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

    /**
     * `new MissionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MissionCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MissionCreateParams)->withName(...)
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
     * @param ExecutionMode|value-of<ExecutionMode>|null $executionMode
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        string $name,
        ?string $description = null,
        ExecutionMode|string|null $executionMode = null,
        ?string $instructions = null,
        ?array $metadata = null,
        ?string $model = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $executionMode && $self['executionMode'] = $executionMode;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $model && $self['model'] = $model;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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
}
