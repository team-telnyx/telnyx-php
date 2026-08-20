<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ConversationFlow;

use Telnyx\AI\Assistants\FlowNode;
use Telnyx\AI\Assistants\SpeakNode;
use Telnyx\AI\Assistants\ToolNode;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * One step in a conversation flow, as returned by the API.
 *
 * @phpstan-import-type FlowNodeShape from \Telnyx\AI\Assistants\FlowNode
 * @phpstan-import-type ToolNodeShape from \Telnyx\AI\Assistants\ToolNode
 * @phpstan-import-type SpeakNodeShape from \Telnyx\AI\Assistants\SpeakNode
 *
 * @phpstan-type NodeVariants = FlowNode|ToolNode|SpeakNode
 * @phpstan-type NodeShape = NodeVariants|FlowNodeShape|ToolNodeShape|SpeakNodeShape
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
        return [
            'prompt' => FlowNode::class,
            'tool' => ToolNode::class,
            'speak' => SpeakNode::class,
        ];
    }
}
