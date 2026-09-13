<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantA2AAgent;

use Telnyx\AI\Assistants\AssistantA2AAgent\Message\A2AAgentRequestResponseDelayedMessage;
use Telnyx\AI\Assistants\AssistantA2AAgent\Message\A2AAgentRequestStartMessage;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type A2AAgentRequestStartMessageShape from \Telnyx\AI\Assistants\AssistantA2AAgent\Message\A2AAgentRequestStartMessage
 * @phpstan-import-type A2AAgentRequestResponseDelayedMessageShape from \Telnyx\AI\Assistants\AssistantA2AAgent\Message\A2AAgentRequestResponseDelayedMessage
 *
 * @phpstan-type MessageVariants = A2AAgentRequestStartMessage|A2AAgentRequestResponseDelayedMessage
 * @phpstan-type MessageShape = MessageVariants|A2AAgentRequestStartMessageShape|A2AAgentRequestResponseDelayedMessageShape
 */
final class Message implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            A2AAgentRequestStartMessage::class,
            A2AAgentRequestResponseDelayedMessage::class,
        ];
    }
}
