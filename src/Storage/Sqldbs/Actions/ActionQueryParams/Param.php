<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs\Actions\ActionQueryParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type ParamVariants = string|float|bool|null
 * @phpstan-type ParamShape = ParamVariants
 */
final class Param implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'float', 'bool', 'null'];
    }
}
