<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands\BrandCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Brands\EinBrandIdentifier;
use Telnyx\Rcs\Brands\StockSymbolBrandIdentifier;

/**
 * Named business identifiers. Use the `ein` key for the required EIN and `stock_symbol` for a public-profit brand's stock symbol.
 *
 * @phpstan-import-type EinBrandIdentifierShape from \Telnyx\Rcs\Brands\EinBrandIdentifier
 * @phpstan-import-type StockSymbolBrandIdentifierShape from \Telnyx\Rcs\Brands\StockSymbolBrandIdentifier
 *
 * @phpstan-type IdentifiersShape = array{
 *   ein: EinBrandIdentifier|EinBrandIdentifierShape,
 *   stockSymbol?: null|StockSymbolBrandIdentifier|StockSymbolBrandIdentifierShape,
 * }
 */
final class Identifiers implements BaseModel
{
    /** @use SdkModel<IdentifiersShape> */
    use SdkModel;

    #[Required]
    public EinBrandIdentifier $ein;

    #[Optional('stock_symbol')]
    public ?StockSymbolBrandIdentifier $stockSymbol;

    /**
     * `new Identifiers()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Identifiers::with(ein: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Identifiers)->withEin(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EinBrandIdentifier|EinBrandIdentifierShape $ein
     * @param StockSymbolBrandIdentifier|StockSymbolBrandIdentifierShape|null $stockSymbol
     */
    public static function with(
        EinBrandIdentifier|array $ein,
        StockSymbolBrandIdentifier|array|null $stockSymbol = null,
    ): self {
        $self = new self;

        $self['ein'] = $ein;

        null !== $stockSymbol && $self['stockSymbol'] = $stockSymbol;

        return $self;
    }

    /**
     * @param EinBrandIdentifier|EinBrandIdentifierShape $ein
     */
    public function withEin(EinBrandIdentifier|array $ein): self
    {
        $self = clone $this;
        $self['ein'] = $ein;

        return $self;
    }

    /**
     * @param StockSymbolBrandIdentifier|StockSymbolBrandIdentifierShape $stockSymbol
     */
    public function withStockSymbol(
        StockSymbolBrandIdentifier|array $stockSymbol
    ): self {
        $self = clone $this;
        $self['stockSymbol'] = $stockSymbol;

        return $self;
    }
}
