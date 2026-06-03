<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Edge;

use Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition;
use Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Edge\Condition\LlmCondition;
use Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Edge\Condition\ToolResultCondition;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Condition that gates the transition. Discriminated by `type`: `llm`, `expression`, or `tool_result`. A `tool_result` condition is only valid on an edge leaving a tool node.
 *
 * @phpstan-import-type LlmConditionShape from \Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Edge\Condition\LlmCondition
 * @phpstan-import-type ExpressionConditionShape from \Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition
 * @phpstan-import-type ToolResultConditionShape from \Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Edge\Condition\ToolResultCondition
 *
 * @phpstan-type ConditionVariants = LlmCondition|ExpressionCondition|ToolResultCondition
 * @phpstan-type ConditionShape = ConditionVariants|LlmConditionShape|ExpressionConditionShape|ToolResultConditionShape
 */
final class Condition implements ConverterSource
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
            'llm' => LlmCondition::class,
            'expression' => ExpressionCondition::class,
            'tool_result' => ToolResultCondition::class,
        ];
    }
}
