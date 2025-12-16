<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Message;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * @phpstan-import-type TextAndImageArrayShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray
 *
 * @phpstan-type ContentShape = string|list<TextAndImageArrayShape>
 */
final class Content implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf(TextAndImageArray::class)];
    }
}
