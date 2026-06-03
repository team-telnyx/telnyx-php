<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ToolResultCondition\Outcome;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Edge condition that fires on the outcome of a tool node's execution.
 *
 * Only valid on edges leaving a tool node (``type == "tool"``). A tool
 * node runs exactly one tool as a deliberate flow step; this condition
 * routes on whether that tool reported ``success`` or ``failure``. Use
 * it to split the happy path from the error path after a tool runs
 * (e.g. payment succeeded vs. declined). There is no ``tool_id`` field —
 * the tool node has a single tool, so the outcome is unambiguous.
 *
 * @phpstan-type ToolResultConditionShape = array{
 *   outcome: Outcome|value-of<Outcome>, type: 'tool_result'
 * }
 */
final class ToolResultCondition implements BaseModel
{
    /** @use SdkModel<ToolResultConditionShape> */
    use SdkModel;

    /** @var 'tool_result' $type */
    #[Required]
    public string $type = 'tool_result';

    /**
     * Match either the tool node's success or failure outcome.
     *
     * @var value-of<Outcome> $outcome
     */
    #[Required(enum: Outcome::class)]
    public string $outcome;

    /**
     * `new ToolResultCondition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolResultCondition::with(outcome: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolResultCondition)->withOutcome(...)
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
     * @param Outcome|value-of<Outcome> $outcome
     */
    public static function with(Outcome|string $outcome): self
    {
        $self = new self;

        $self['outcome'] = $outcome;

        return $self;
    }

    /**
     * Match either the tool node's success or failure outcome.
     *
     * @param Outcome|value-of<Outcome> $outcome
     */
    public function withOutcome(Outcome|string $outcome): self
    {
        $self = clone $this;
        $self['outcome'] = $outcome;

        return $self;
    }

    /**
     * @param 'tool_result' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
