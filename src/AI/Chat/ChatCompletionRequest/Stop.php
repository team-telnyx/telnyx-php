<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCompletionRequest;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Up to 4 sequences where the API will stop generating further tokens. The returned text will not contain the stop sequence.
 *
 * @phpstan-type StopVariants = string|list<string>
 * @phpstan-type StopShape = StopVariants
 */
final class Stop implements ConverterSource
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
