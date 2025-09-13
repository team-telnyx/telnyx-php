<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type street_address = array{contains?: string}
 */
final class StreetAddress implements BaseModel
{
    /** @use SdkModel<street_address> */
    use SdkModel;

    /**
     * If present, addresses with <code>street_address</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    #[Api(optional: true)]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;

        return $obj;
    }

    /**
     * If present, addresses with <code>street_address</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }
}
