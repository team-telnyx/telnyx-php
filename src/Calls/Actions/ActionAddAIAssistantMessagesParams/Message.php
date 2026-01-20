<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams;

use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage;
use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\DeveloperMessage;
use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\SystemMessage;
use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\ToolMessage;
use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\UserMessage;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Messages sent by an end user.
 *
 * @phpstan-import-type UserMessageShape from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\UserMessage
 * @phpstan-import-type AssistantMessageShape from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage
 * @phpstan-import-type ToolMessageShape from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\ToolMessage
 * @phpstan-import-type SystemMessageShape from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\SystemMessage
 * @phpstan-import-type DeveloperMessageShape from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\DeveloperMessage
 *
 * @phpstan-type MessageVariants = UserMessage|AssistantMessage|ToolMessage|SystemMessage|DeveloperMessage
 * @phpstan-type MessageShape = MessageVariants|UserMessageShape|AssistantMessageShape|ToolMessageShape|SystemMessageShape|DeveloperMessageShape
 */
final class Message implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'role';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'user' => UserMessage::class,
            'assistant' => AssistantMessage::class,
            'tool' => ToolMessage::class,
            'system' => SystemMessage::class,
            'developer' => DeveloperMessage::class,
        ];
    }
}
