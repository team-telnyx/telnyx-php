<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StockSymbolBrandIdentifierShape = array{
 *   identifierType: 'STOCK_SYMBOL', value: string
 * }
 */
final class StockSymbolBrandIdentifier implements BaseModel
{
    /** @use SdkModel<StockSymbolBrandIdentifierShape> */
    use SdkModel;

    /** @var 'STOCK_SYMBOL' $identifierType */
    #[Required('identifier_type')]
    public string $identifierType = 'STOCK_SYMBOL';

    /**
     * A stock symbol using EXCHANGE:SYMBOL.
     */
    #[Required]
    public string $value;

    /**
     * `new StockSymbolBrandIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StockSymbolBrandIdentifier::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StockSymbolBrandIdentifier)->withValue(...)
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
     */
    public static function with(string $value): self
    {
        $self = new self;

        $self['value'] = $value;

        return $self;
    }

    /**
     * @param 'STOCK_SYMBOL' $identifierType
     */
    public function withIdentifierType(string $identifierType): self
    {
        $self = clone $this;
        $self['identifierType'] = $identifierType;

        return $self;
    }

    /**
     * A stock symbol using EXCHANGE:SYMBOL.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
