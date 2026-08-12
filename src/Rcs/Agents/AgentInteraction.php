<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentInteraction\InteractionType;

/**
 * @phpstan-type AgentInteractionShape = array{
 *   interactionType: InteractionType|value-of<InteractionType>,
 *   description?: string|null,
 * }
 */
final class AgentInteraction implements BaseModel
{
    /** @use SdkModel<AgentInteractionShape> */
    use SdkModel;

    /** @var value-of<InteractionType> $interactionType */
    #[Required('interaction_type', enum: InteractionType::class)]
    public string $interactionType;

    /**
     * Required when interaction_type is `OTHER`.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * `new AgentInteraction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentInteraction::with(interactionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentInteraction)->withInteractionType(...)
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
     * @param InteractionType|value-of<InteractionType> $interactionType
     */
    public static function with(
        InteractionType|string $interactionType,
        ?string $description = null
    ): self {
        $self = new self;

        $self['interactionType'] = $interactionType;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * @param InteractionType|value-of<InteractionType> $interactionType
     */
    public function withInteractionType(
        InteractionType|string $interactionType
    ): self {
        $self = clone $this;
        $self['interactionType'] = $interactionType;

        return $self;
    }

    /**
     * Required when interaction_type is `OTHER`.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
