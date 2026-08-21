<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type EinBrandIdentifierShape from \Telnyx\Rcs\Brands\EinBrandIdentifier
 * @phpstan-import-type StockSymbolBrandIdentifierShape from \Telnyx\Rcs\Brands\StockSymbolBrandIdentifier
 *
 * @phpstan-type BrandIdentifierVariants = EinBrandIdentifier|StockSymbolBrandIdentifier
 * @phpstan-type BrandIdentifierShape = BrandIdentifierVariants|EinBrandIdentifierShape|StockSymbolBrandIdentifierShape
 */
final class BrandIdentifier implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'identifierType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'EIN' => EinBrandIdentifier::class,
            'STOCK_SYMBOL' => StockSymbolBrandIdentifier::class,
        ];
    }
}
