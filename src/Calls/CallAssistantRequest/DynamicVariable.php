<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallAssistantRequest;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type DynamicVariableVariants = string|float|bool
 * @phpstan-type DynamicVariableShape = DynamicVariableVariants
 */
final class DynamicVariable implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'float', 'bool'];
    }
}
