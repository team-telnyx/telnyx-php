<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPID\In;

/**
 * Filter by exact Global IP ID.
 *
 * @phpstan-import-type InShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPID\In
 *
 * @phpstan-type GlobalIPIDVariants = string|In
 * @phpstan-type GlobalIPIDShape = GlobalIPIDVariants|InShape
 */
final class GlobalIPID implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', In::class];
    }
}
