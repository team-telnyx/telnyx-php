<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands\BrandResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Rcs\Brands\EinBrandIdentifier;
use Telnyx\Rcs\Brands\StockSymbolBrandIdentifier;

/**
 * @phpstan-import-type EinBrandIdentifierShape from \Telnyx\Rcs\Brands\EinBrandIdentifier
 * @phpstan-import-type StockSymbolBrandIdentifierShape from \Telnyx\Rcs\Brands\StockSymbolBrandIdentifier
 *
 * @phpstan-type IdentifierVariants = EinBrandIdentifier|StockSymbolBrandIdentifier
 * @phpstan-type IdentifierShape = IdentifierVariants|EinBrandIdentifierShape|StockSymbolBrandIdentifierShape
 */
final class Identifier implements ConverterSource
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
