<?php

declare(strict_types=1);

namespace Telnyx\AI\Anthropic\V1\V1MessagesParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;

/**
 * System prompt. Can be a string or an array of content blocks following the Anthropic API format.
 *
 * @phpstan-type SystemVariants = string|list<array<string,mixed>>
 * @phpstan-type SystemShape = SystemVariants
 */
final class System implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf(new MapOf('mixed'))];
    }
}
