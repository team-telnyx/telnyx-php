<?php

declare(strict_types=1);

namespace Telnyx\Pricing\Products\ProductGetResponse\Data;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Per-unit rate. Numeric for standard products, string for inference products. Null for rate-deck products.
 *
 * @phpstan-type RateVariants = float|string
 * @phpstan-type RateShape = RateVariants
 */
final class Rate implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['float', 'string'];
    }
}
