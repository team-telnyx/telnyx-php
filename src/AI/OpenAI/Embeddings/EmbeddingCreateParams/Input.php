<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Input text to embed. Can be a string or array of strings.
 *
 * @phpstan-type InputVariants = string|list<string>
 * @phpstan-type InputShape = InputVariants
 */
final class Input implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf('string')];
    }
}
