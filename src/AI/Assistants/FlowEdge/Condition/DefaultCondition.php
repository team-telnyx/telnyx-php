<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\FlowEdge\Condition;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Fallback edge condition: fires only when no other edge's condition is true.
 *
 * Evaluated after every conditioned (`llm` / `expression`) edge regardless
 * of declaration order, so it routes the flow whenever none of the node's
 * other outgoing edges match. Valid **only** on edges leaving a `tool` or
 * `speak` node, where the deterministic step auto-advances and must always
 * have somewhere to go. A tool/speak node with any outgoing edge is required
 * to carry exactly one `default` edge so it never dead-ends; a tool/speak
 * node with no outgoing edges is a valid terminal step. Carries no parameters.
 *
 * @phpstan-type DefaultConditionShape = array{type: 'default'}
 */
final class DefaultCondition implements BaseModel
{
    /** @use SdkModel<DefaultConditionShape> */
    use SdkModel;

    /** @var 'default' $type */
    #[Required]
    public string $type = 'default';

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(): self
    {
        return new self;
    }

    /**
     * @param 'default' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
