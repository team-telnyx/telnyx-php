<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\ComparativeLine;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\SimpleLine;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

final class Line implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'comparative' => ComparativeLine::class, 'simple' => SimpleLine::class,
        ];
    }
}
