<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter\GlobalIPID\In;

/**
 * Filter by exact Global IP ID.
 *
 * @phpstan-import-type InShape from \Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter\GlobalIPID\In
 *
 * @phpstan-type GlobalIPIDShape = string|InShape
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
