<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationAddMessageParams;

use Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata\UnionMember3;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

final class Metadata implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'int', 'bool', new ListOf(UnionMember3::class)];
    }
}
