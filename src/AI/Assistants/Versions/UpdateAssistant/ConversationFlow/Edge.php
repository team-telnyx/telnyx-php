<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\LlmCondition;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target\AssistantTarget;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target\NodeTarget;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Directed transition from one node to a target, gated by a condition.
 *
 * The target is either another node in the same flow (`NodeTarget`) or a
 * different assistant (`AssistantTarget`). Multiple edges may share a
 * `start_node_id`; the runtime evaluates them in the order they're
 * declared and takes the first whose condition is true.
 *
 * @phpstan-import-type ConditionVariants from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition
 * @phpstan-import-type TargetVariants from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target
 * @phpstan-import-type ConditionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition
 * @phpstan-import-type TargetShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target
 *
 * @phpstan-type EdgeShape = array{
 *   id: string,
 *   condition: ConditionShape,
 *   startNodeID: string,
 *   target: TargetShape,
 * }
 */
final class Edge implements BaseModel
{
    /** @use SdkModel<EdgeShape> */
    use SdkModel;

    /**
     * Caller-supplied unique identifier for this edge within the flow.
     */
    #[Required]
    public string $id;

    /**
     * Condition that gates the transition. Discriminated by `type`: `llm`, `expression`.
     *
     * @var ConditionVariants $condition
     */
    #[Required(union: Condition::class)]
    public LlmCondition|ExpressionCondition $condition;

    /**
     * ID of the node this edge transitions away from.
     */
    #[Required('start_node_id')]
    public string $startNodeID;

    /**
     * Destination of the transition. Discriminated by `type`: `node` (jump to another node in this flow) or `assistant` (hand off to a different assistant).
     *
     * @var TargetVariants $target
     */
    #[Required(union: Target::class)]
    public NodeTarget|AssistantTarget $target;

    /**
     * `new Edge()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Edge::with(id: ..., condition: ..., startNodeID: ..., target: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Edge)
     *   ->withID(...)
     *   ->withCondition(...)
     *   ->withStartNodeID(...)
     *   ->withTarget(...)
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
     * @param ConditionShape $condition
     * @param TargetShape $target
     */
    public static function with(
        string $id,
        LlmCondition|array|ExpressionCondition $condition,
        string $startNodeID,
        NodeTarget|array|AssistantTarget $target,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['condition'] = $condition;
        $self['startNodeID'] = $startNodeID;
        $self['target'] = $target;

        return $self;
    }

    /**
     * Caller-supplied unique identifier for this edge within the flow.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Condition that gates the transition. Discriminated by `type`: `llm`, `expression`.
     *
     * @param ConditionShape $condition
     */
    public function withCondition(
        LlmCondition|array|ExpressionCondition $condition
    ): self {
        $self = clone $this;
        $self['condition'] = $condition;

        return $self;
    }

    /**
     * ID of the node this edge transitions away from.
     */
    public function withStartNodeID(string $startNodeID): self
    {
        $self = clone $this;
        $self['startNodeID'] = $startNodeID;

        return $self;
    }

    /**
     * Destination of the transition. Discriminated by `type`: `node` (jump to another node in this flow) or `assistant` (hand off to a different assistant).
     *
     * @param TargetShape $target
     */
    public function withTarget(NodeTarget|array|AssistantTarget $target): self
    {
        $self = clone $this;
        $self['target'] = $target;

        return $self;
    }
}
