<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * 2D coordinates for a node, used by authoring UIs to lay out the graph.
 *
 * Purely a presentation aid. The runtime ignores `position`; it round-trips
 * through the API so frontends can persist the graph layout customers
 * arrange in the editor.
 *
 * @phpstan-type NodePositionShape = array{x: float, y: float}
 */
final class NodePosition implements BaseModel
{
    /** @use SdkModel<NodePositionShape> */
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
     * `new NodePosition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NodePosition::with(x: ..., y: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NodePosition)->withX(...)->withY(...)
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
