<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\Retrieval;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

final class Tool implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [ChatCompletionToolParam::class, Retrieval::class];
    }
}
