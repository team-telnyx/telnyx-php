<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse;

use Telnyx\AI\Conversations\Messages\MessageListResponse\Metadata\ConversationMetadataListValue;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * @phpstan-import-type ConversationMetadataListValueShape from \Telnyx\AI\Conversations\Messages\MessageListResponse\Metadata\ConversationMetadataListValue
 *
 * @phpstan-type MetadataVariants = string|int|bool|list<string|int|bool>
 * @phpstan-type MetadataShape = MetadataVariants|list<ConversationMetadataListValueShape>
 */
final class Metadata implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'string', 'int', 'bool', new ListOf(ConversationMetadataListValue::class),
        ];
    }
}
