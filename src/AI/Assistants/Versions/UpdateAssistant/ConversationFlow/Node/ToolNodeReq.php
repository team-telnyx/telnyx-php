<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\ToolNodeReq\Position;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\ToolNodeReq\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A standalone tool step in a conversation flow, as supplied by clients.
 *
 * Unlike a prompt node, a tool node has no instructions or model — it
 * isn't an LLM turn. Reaching it deterministically runs one shared tool
 * (arguments filled from matching dynamic variables by name), then routes
 * on the result via outgoing `tool_result` edges.
 *
 * @phpstan-import-type PositionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\ToolNodeReq\Position
 *
 * @phpstan-type ToolNodeReqShape = array{
 *   id: string,
 *   sharedToolID: string,
 *   name?: string|null,
 *   position?: null|Position|PositionShape,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class ToolNodeReq implements BaseModel
{
    /** @use SdkModel<ToolNodeReqShape> */
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
    public ?Position $position;

    /**
     * Node kind discriminator. Always `tool` for a tool node.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new ToolNodeReq()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolNodeReq::with(id: ..., sharedToolID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolNodeReq)->withID(...)->withSharedToolID(...)
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
     * @param Position|PositionShape|null $position
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $id,
        string $sharedToolID,
        ?string $name = null,
        Position|array|null $position = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['sharedToolID'] = $sharedToolID;

        null !== $name && $self['name'] = $name;
        null !== $position && $self['position'] = $position;
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
     * @param Position|PositionShape $position
     */
    public function withPosition(Position|array $position): self
    {
        $self = clone $this;
        $self['position'] = $position;

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
