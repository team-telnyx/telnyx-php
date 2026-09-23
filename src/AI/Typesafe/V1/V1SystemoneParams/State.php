<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;

/**
 * Shared context evaluated by every question.
 *
 * @phpstan-type StateVariants = string|list<mixed>|array<string,mixed>
 * @phpstan-type StateShape = StateVariants
 */
final class State implements ConverterSource
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
