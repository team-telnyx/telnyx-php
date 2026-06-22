<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\FlowEdge;

use Telnyx\AI\Assistants\FlowEdge\Condition\DefaultCondition;
use Telnyx\AI\Assistants\FlowEdge\Condition\ExpressionCondition;
use Telnyx\AI\Assistants\FlowEdge\Condition\LlmCondition;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Condition that gates the transition. Discriminated by `type`: `llm`, `expression`.
 *
 * @phpstan-import-type LlmConditionShape from \Telnyx\AI\Assistants\FlowEdge\Condition\LlmCondition
 * @phpstan-import-type ExpressionConditionShape from \Telnyx\AI\Assistants\FlowEdge\Condition\ExpressionCondition
 * @phpstan-import-type DefaultConditionShape from \Telnyx\AI\Assistants\FlowEdge\Condition\DefaultCondition
 *
 * @phpstan-type ConditionVariants = LlmCondition|ExpressionCondition|DefaultCondition
 * @phpstan-type ConditionShape = ConditionVariants|LlmConditionShape|ExpressionConditionShape|DefaultConditionShape
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
            'default' => DefaultCondition::class,
        ];
    }
}
