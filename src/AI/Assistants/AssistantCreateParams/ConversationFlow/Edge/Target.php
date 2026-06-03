<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge;

use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Target\AssistantTarget;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Target\NodeTarget;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Destination of the transition. Discriminated by `type`: `node` (jump to another node in this flow) or `assistant` (hand off to a different assistant).
 *
 * @phpstan-import-type NodeTargetShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Target\NodeTarget
 * @phpstan-import-type AssistantTargetShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Target\AssistantTarget
 *
 * @phpstan-type TargetVariants = NodeTarget|AssistantTarget
 * @phpstan-type TargetShape = TargetVariants|NodeTargetShape|AssistantTargetShape
 */
final class Target implements ConverterSource
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
        return ['node' => NodeTarget::class, 'assistant' => AssistantTarget::class];
    }
}
