<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\ConversationFlowReq\Node;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Conversation flow as supplied by API clients (create / update).
 *
 * A directed graph of `FlowNodeReq` connected by `FlowEdge`s. Validation
 * enforces unique node/edge IDs, that `start_node_id` references a real
 * node, and that every edge's endpoints reference real nodes.
 *
 * @phpstan-import-type NodeVariants from \Telnyx\AI\Assistants\ConversationFlowReq\Node
 * @phpstan-import-type NodeShape from \Telnyx\AI\Assistants\ConversationFlowReq\Node
 * @phpstan-import-type FlowEdgeShape from \Telnyx\AI\Assistants\FlowEdge
 *
 * @phpstan-type ConversationFlowReqShape = array{
 *   nodes: list<NodeShape>,
 *   startNodeID: string,
 *   edges?: list<FlowEdge|FlowEdgeShape>|null,
 * }
 */
final class ConversationFlowReq implements BaseModel
{
    /** @use SdkModel<ConversationFlowReqShape> */
    use SdkModel;

    /**
     * All nodes in the flow. Must contain `start_node_id`. Each node is a prompt node (`type: prompt`) or a tool node (`type: tool`).
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
     * Directed transitions between nodes. May be empty for a single-node flow.
     *
     * @var list<FlowEdge>|null $edges
     */
    #[Optional(list: FlowEdge::class)]
    public ?array $edges;

    /**
     * `new ConversationFlowReq()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationFlowReq::with(nodes: ..., startNodeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationFlowReq)->withNodes(...)->withStartNodeID(...)
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
     * All nodes in the flow. Must contain `start_node_id`. Each node is a prompt node (`type: prompt`) or a tool node (`type: tool`).
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
     * Directed transitions between nodes. May be empty for a single-node flow.
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
