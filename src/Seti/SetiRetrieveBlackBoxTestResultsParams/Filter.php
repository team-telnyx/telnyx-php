<?php

declare(strict_types=1);

namespace Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[product].
 *
 * @phpstan-type filter_alias = array{product?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter results for a specific product.
     */
    #[Api(optional: true)]
    public ?string $product;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $product = null): self
    {
        $obj = new self;

        null !== $product && $obj->product = $product;

        return $obj;
    }

    /**
     * Filter results for a specific product.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj->product = $product;

        return $obj;
    }
}
