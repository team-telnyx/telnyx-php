<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Target\AssistantTarget;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional canvas coordinates for rendering the target assistant as a node in authoring UIs. Pure presentation — the runtime ignores it; round-trips so frontends can persist graph layout across reloads. When multiple edges target the same assistant, each edge's `position` is independent (frontends typically use the first non-null one).
 *
 * @phpstan-type PositionShape = array{x: float, y: float}
 */
final class Position implements BaseModel
{
    /** @use SdkModel<PositionShape> */
    use SdkModel;

    /**
     * Horizontal coordinate in the authoring canvas.
     */
    #[Required]
    public float $x;

    /**
     * Vertical coordinate in the authoring canvas.
     */
    #[Required]
    public float $y;

    /**
     * `new Position()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Position::with(x: ..., y: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Position)->withX(...)->withY(...)
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
     */
    public static function with(float $x, float $y): self
    {
        $self = new self;

        $self['x'] = $x;
        $self['y'] = $y;

        return $self;
    }

    /**
     * Horizontal coordinate in the authoring canvas.
     */
    public function withX(float $x): self
    {
        $self = clone $this;
        $self['x'] = $x;

        return $self;
    }

    /**
     * Vertical coordinate in the authoring canvas.
     */
    public function withY(float $y): self
    {
        $self = clone $this;
        $self['y'] = $y;

        return $self;
    }
}
