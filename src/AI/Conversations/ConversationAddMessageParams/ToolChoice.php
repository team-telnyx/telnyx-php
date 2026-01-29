<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationAddMessageParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\MapOf;

/**
 * @phpstan-type ToolChoiceVariants = string|array<string,mixed>
 * @phpstan-type ToolChoiceShape = ToolChoiceVariants
 */
final class ToolChoice implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new MapOf('mixed')];
    }
}
