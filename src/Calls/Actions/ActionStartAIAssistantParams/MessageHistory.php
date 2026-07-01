<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams;

use Telnyx\Calls\Actions\AssistantMessage;
use Telnyx\Calls\Actions\DeveloperMessage;
use Telnyx\Calls\Actions\SystemMessage;
use Telnyx\Calls\Actions\ToolMessage;
use Telnyx\Calls\Actions\UserMessage;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Messages sent by an end user.
 *
 * @phpstan-import-type UserMessageShape from \Telnyx\Calls\Actions\UserMessage
 * @phpstan-import-type AssistantMessageShape from \Telnyx\Calls\Actions\AssistantMessage
 * @phpstan-import-type ToolMessageShape from \Telnyx\Calls\Actions\ToolMessage
 * @phpstan-import-type SystemMessageShape from \Telnyx\Calls\Actions\SystemMessage
 * @phpstan-import-type DeveloperMessageShape from \Telnyx\Calls\Actions\DeveloperMessage
 *
 * @phpstan-type MessageHistoryVariants = UserMessage|AssistantMessage|ToolMessage|SystemMessage|DeveloperMessage
 * @phpstan-type MessageHistoryShape = MessageHistoryVariants|UserMessageShape|AssistantMessageShape|ToolMessageShape|SystemMessageShape|DeveloperMessageShape
 */
final class MessageHistory implements ConverterSource
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
