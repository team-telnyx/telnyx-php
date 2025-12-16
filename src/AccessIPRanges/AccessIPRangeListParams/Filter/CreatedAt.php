<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter;

use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt\DateRangeFilter;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Filter by exact creation date-time.
 *
 * @phpstan-import-type DateRangeFilterShape from \Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt\DateRangeFilter
 *
 * @phpstan-type CreatedAtShape = \DateTimeInterface|DateRangeFilterShape
 */
final class CreatedAt implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['\DateTimeInterface', DateRangeFilter::class];
    }
}
