<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type UnionArrayVariant3Variants = string|int|bool
 * @phpstan-type UnionArrayVariant3Shape = UnionArrayVariant3Variants
 */
final class UnionArrayVariant3 implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'int', 'bool'];
    }
}
