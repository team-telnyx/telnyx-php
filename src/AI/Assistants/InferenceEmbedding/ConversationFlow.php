<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding;

use Telnyx\AI\Assistants\FlowEdge;
use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Conversation flow as returned by the API.
 *
 * @phpstan-import-type NodeVariants from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node
 * @phpstan-import-type NodeShape from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node
 * @phpstan-import-type FlowEdgeShape from \Telnyx\AI\Assistants\FlowEdge
 *
 * @phpstan-type ConversationFlowShape = array{
 *   nodes: list<NodeShape>,
 *   startNodeID: string,
 *   edges?: list<FlowEdge|FlowEdgeShape>|null,
 * }
 */
final class ConversationFlow implements BaseModel
{
    /** @use SdkModel<ConversationFlowShape> */
    use SdkModel;

    /**
     * All nodes in the flow.
     *
     * @var list<NodeVariants> $nodes
     */
    #[Required(list: Node::class)]
    public array $nodes;

    /**
     * ID of the node where the conversation begins.
     */
    #[Required('start_node_id')]
    public string $startNodeID;

    /**
     * Directed transitions between nodes.
     *
     * @var list<FlowEdge>|null $edges
     */
    #[Optional(list: FlowEdge::class)]
    public ?array $edges;

    /**
     * `new ConversationFlow()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationFlow::with(nodes: ..., startNodeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationFlow)->withNodes(...)->withStartNodeID(...)
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
     * @param list<NodeShape> $nodes
     * @param list<FlowEdge|FlowEdgeShape>|null $edges
     */
    public static function with(
        array $nodes,
        string $startNodeID,
        ?array $edges = null
    ): self {
        $self = new self;

        $self['nodes'] = $nodes;
        $self['startNodeID'] = $startNodeID;

        null !== $edges && $self['edges'] = $edges;

        return $self;
    }

    /**
     * All nodes in the flow.
     *
     * @param list<NodeShape> $nodes
     */
    public function withNodes(array $nodes): self
    {
        $self = clone $this;
        $self['nodes'] = $nodes;

        return $self;
    }

    /**
     * ID of the node where the conversation begins.
     */
    public function withStartNodeID(string $startNodeID): self
    {
        $self = clone $this;
        $self['startNodeID'] = $startNodeID;

        return $self;
    }

    /**
     * Directed transitions between nodes.
     *
     * @param list<FlowEdge|FlowEdgeShape> $edges
     */
    public function withEdges(array $edges): self
    {
        $self = clone $this;
        $self['edges'] = $edges;

        return $self;
    }
}
