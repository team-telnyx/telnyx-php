<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\FlowEdge\Target;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Edge target referencing another node within the same flow.
 *
 * The runtime transitions the active node to `node_id` and continues
 * processing within the current assistant's flow.
 *
 * @phpstan-type NodeTargetShape = array{nodeID: string, type: 'node'}
 */
final class NodeTarget implements BaseModel
{
    /** @use SdkModel<NodeTargetShape> */
    use SdkModel;

    /** @var 'node' $type */
    #[Required]
    public string $type = 'node';

    /**
     * ID of the node this edge transitions into.
     */
    #[Required('node_id')]
    public string $nodeID;

    /**
     * `new NodeTarget()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NodeTarget::with(nodeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NodeTarget)->withNodeID(...)
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
    public static function with(string $nodeID): self
    {
        $self = new self;

        $self['nodeID'] = $nodeID;

        return $self;
    }

    /**
     * ID of the node this edge transitions into.
     */
    public function withNodeID(string $nodeID): self
    {
        $self = clone $this;
        $self['nodeID'] = $nodeID;

        return $self;
    }

    /**
     * @param 'node' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
