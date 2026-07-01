<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCompletionRequest;

use Telnyx\AI\Chat\ChatCompletionRequest\Tool\ChatCompletionToolParam;
use Telnyx\AI\Chat\ChatCompletionRequest\Tool\Retrieval;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ChatCompletionToolParamShape from \Telnyx\AI\Chat\ChatCompletionRequest\Tool\ChatCompletionToolParam
 * @phpstan-import-type RetrievalShape from \Telnyx\AI\Chat\ChatCompletionRequest\Tool\Retrieval
 *
 * @phpstan-type ToolVariants = ChatCompletionToolParam|Retrieval
 * @phpstan-type ToolShape = ToolVariants|ChatCompletionToolParamShape|RetrievalShape
 */
final class Tool implements ConverterSource
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
            'function' => ChatCompletionToolParam::class,
            'retrieval' => Retrieval::class,
        ];
    }
}
