<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow;

use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\SpeakNodeReq;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\ToolNodeReq;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * One step in a conversation flow, as supplied by API clients.
 *
 * Each node carries the prompt, tool scope, and optional overrides for
 * model/voice/transcription. Unset overrides cascade from the assistant.
 *
 * @phpstan-import-type FlowNodeReqShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq
 * @phpstan-import-type ToolNodeReqShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\ToolNodeReq
 * @phpstan-import-type SpeakNodeReqShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\SpeakNodeReq
 *
 * @phpstan-type NodeVariants = FlowNodeReq|ToolNodeReq|SpeakNodeReq
 * @phpstan-type NodeShape = NodeVariants|FlowNodeReqShape|ToolNodeReqShape|SpeakNodeReqShape
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
            'prompt' => FlowNodeReq::class,
            'tool' => ToolNodeReq::class,
            'speak' => SpeakNodeReq::class,
        ];
    }
}
