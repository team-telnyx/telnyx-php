<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ConversationFlowReq\Node;

use Telnyx\AI\Assistants\ConversationFlowReq\Node\SpeakNodeReq\Type;
use Telnyx\AI\Assistants\NodePosition;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A standalone scripted-message step in a flow, as supplied by clients.
 *
 * Unlike a prompt node, a speak node has no instructions or model — it isn't
 * an LLM turn. Reaching it delivers `message` to the user verbatim (with
 * `{{variable}}` interpolation), then routes via outgoing `llm` /
 * `expression` edges.
 *
 * @phpstan-import-type NodePositionShape from \Telnyx\AI\Assistants\NodePosition
 *
 * @phpstan-type SpeakNodeReqShape = array{
 *   id: string,
 *   message: string,
 *   name?: string|null,
 *   position?: null|NodePosition|NodePositionShape,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class SpeakNodeReq implements BaseModel
{
    /** @use SdkModel<SpeakNodeReqShape> */
    use SdkModel;

    /**
     * Caller-supplied unique identifier for this node within the flow.
     */
    #[Required]
    public string $id;

    /**
     * Message delivered to the user verbatim when the flow reaches this node. No LLM turn — the text is spoken/sent exactly as written. `{{variable}}` placeholders are interpolated from the conversation's dynamic variables; an unresolved placeholder renders as an empty string. After delivering, the flow routes via the node's outgoing `llm` / `expression` edges (commonly a single unconditional edge).
     */
    #[Required]
    public string $message;

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
     * Node kind discriminator. Always `speak` for a speak node.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new SpeakNodeReq()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpeakNodeReq::with(id: ..., message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpeakNodeReq)->withID(...)->withMessage(...)
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $id,
        string $message,
        ?string $name = null,
        NodePosition|array|null $position = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['message'] = $message;

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
     * Message delivered to the user verbatim when the flow reaches this node. No LLM turn — the text is spoken/sent exactly as written. `{{variable}}` placeholders are interpolated from the conversation's dynamic variables; an unresolved placeholder renders as an empty string. After delivering, the flow routes via the node's outgoing `llm` / `expression` edges (commonly a single unconditional edge).
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

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
     * Node kind discriminator. Always `speak` for a speak node.
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
