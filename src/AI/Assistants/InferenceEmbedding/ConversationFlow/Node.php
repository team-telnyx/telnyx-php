<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow;

use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\FlowNode;
use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\ToolNode;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * One step in a conversation flow, as returned by the API.
 *
 * @phpstan-import-type FlowNodeShape from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\FlowNode
 * @phpstan-import-type ToolNodeShape from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\ToolNode
 *
 * @phpstan-type NodeVariants = FlowNode|ToolNode
 * @phpstan-type NodeShape = NodeVariants|FlowNodeShape|ToolNodeShape
 */
final class Node implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['prompt' => FlowNode::class, 'tool' => ToolNode::class];
    }
}
