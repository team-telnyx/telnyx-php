<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node;

use Telnyx\AI\Assistants\AssistantTool;
use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\ToolNode\Type;
use Telnyx\AI\Assistants\NodePosition;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A standalone tool step in a conversation flow, as returned by the API.
 *
 * @phpstan-import-type AssistantToolVariants from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type NodePositionShape from \Telnyx\AI\Assistants\NodePosition
 * @phpstan-import-type AssistantToolShape from \Telnyx\AI\Assistants\AssistantTool
 *
 * @phpstan-type ToolNodeShape = array{
 *   id: string,
 *   sharedToolID: string,
 *   name?: string|null,
 *   position?: null|NodePosition|NodePositionShape,
 *   tool?: list<AssistantToolShape>|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class ToolNode implements BaseModel
{
    /** @use SdkModel<ToolNodeShape> */
    use SdkModel;

    /**
     * Caller-supplied unique identifier for this node within the flow.
     */
    #[Required]
    public string $id;

    /**
     * ID of the single shared (org-level) tool this node executes. When the flow reaches this node the tool runs as a deliberate step (no LLM turn); its outgoing `tool_result` edges then route on the outcome. Arguments are filled from the conversation's dynamic variables by name — a dynamic variable whose name matches one of the tool's parameters supplies that argument. Cross-validated against the org's shared tools on write.
     */
    #[Required('shared_tool_id')]
    public string $sharedToolID;

    /**
     * Optional human-readable label, displayed in authoring UIs.
     */
    #[Optional]
    public ?string $name;

    /**
     * Optional canvas coordinates used by authoring UIs to lay out the graph. Ignored by the runtime; round-trips so frontends can persist graph layout across reloads.
     */
    #[Optional]
    public ?NodePosition $position;

    /**
     * Full tool definition resolved from `shared_tool_id` server-side. Populated on responses so clients can render the node without a follow-up fetch. Ignored on input — set `shared_tool_id`.
     *
     * @var list<AssistantToolVariants>|null $tool
     */
    #[Optional(list: AssistantTool::class)]
    public ?array $tool;

    /**
     * Node kind discriminator. Always `tool` for a tool node.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new ToolNode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolNode::with(id: ..., sharedToolID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolNode)->withID(...)->withSharedToolID(...)
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
     * @param NodePosition|NodePositionShape|null $position
     * @param list<AssistantToolShape>|null $tool
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $id,
        string $sharedToolID,
        ?string $name = null,
        NodePosition|array|null $position = null,
        ?array $tool = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['sharedToolID'] = $sharedToolID;

        null !== $name && $self['name'] = $name;
        null !== $position && $self['position'] = $position;
        null !== $tool && $self['tool'] = $tool;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Caller-supplied unique identifier for this node within the flow.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ID of the single shared (org-level) tool this node executes. When the flow reaches this node the tool runs as a deliberate step (no LLM turn); its outgoing `tool_result` edges then route on the outcome. Arguments are filled from the conversation's dynamic variables by name — a dynamic variable whose name matches one of the tool's parameters supplies that argument. Cross-validated against the org's shared tools on write.
     */
    public function withSharedToolID(string $sharedToolID): self
    {
        $self = clone $this;
        $self['sharedToolID'] = $sharedToolID;

        return $self;
    }

    /**
     * Optional human-readable label, displayed in authoring UIs.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Optional canvas coordinates used by authoring UIs to lay out the graph. Ignored by the runtime; round-trips so frontends can persist graph layout across reloads.
     *
     * @param NodePosition|NodePositionShape $position
     */
    public function withPosition(NodePosition|array $position): self
    {
        $self = clone $this;
        $self['position'] = $position;

        return $self;
    }

    /**
     * Full tool definition resolved from `shared_tool_id` server-side. Populated on responses so clients can render the node without a follow-up fetch. Ignored on input — set `shared_tool_id`.
     *
     * @param list<AssistantToolShape> $tool
     */
    public function withTool(array $tool): self
    {
        $self = clone $this;
        $self['tool'] = $tool;

        return $self;
    }

    /**
     * Node kind discriminator. Always `tool` for a tool node.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
