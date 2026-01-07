<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListRejectionCodesParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Filter rejections of a specific code.
 *
 * @phpstan-type CodeVariants = int|list<int>
 * @phpstan-type CodeShape = CodeVariants
 */
final class Code implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['int', new ListOf('int')];
    }
}
