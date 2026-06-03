<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\FlowNodeReq;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\ToolNodeReq;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * One step in a conversation flow, as supplied by API clients.
 *
 * Each node carries the prompt, tool scope, and optional overrides for
 * model/voice/transcription. Unset overrides cascade from the assistant.
 *
 * @phpstan-import-type FlowNodeReqShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\FlowNodeReq
 * @phpstan-import-type ToolNodeReqShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\ToolNodeReq
 *
 * @phpstan-type NodeVariants = FlowNodeReq|ToolNodeReq
 * @phpstan-type NodeShape = NodeVariants|FlowNodeReqShape|ToolNodeReqShape
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
        return ['prompt' => FlowNodeReq::class, 'tool' => ToolNodeReq::class];
    }
}
