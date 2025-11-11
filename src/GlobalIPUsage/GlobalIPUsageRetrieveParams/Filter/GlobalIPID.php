<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter\GlobalIPID\In;

/**
 * Filter by exact Global IP ID.
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
