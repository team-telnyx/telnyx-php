<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelChoiceQuestion;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;

/**
 * Required instructions describing what to decide about the shared state.
 *
 * @phpstan-type InstructionsVariants = string|list<mixed>|array<string,mixed>
 * @phpstan-type InstructionsShape = InstructionsVariants
 */
final class Instructions implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new MapOf('mixed'), new ListOf('mixed')];
    }
}
