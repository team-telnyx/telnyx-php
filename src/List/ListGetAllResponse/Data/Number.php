<?php

declare(strict_types=1);

namespace Telnyx\List\ListGetAllResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type number_alias = array{country?: string, number?: string}
 */
final class Number implements BaseModel
{
    /** @use SdkModel<number_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $country;

    #[Api(optional: true)]
    public ?string $number;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $country = null,
        ?string $number = null
    ): self {
        $obj = new self;

        null !== $country && $obj->country = $country;
        null !== $number && $obj->number = $number;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    public function withNumber(string $number): self
    {
        $obj = clone $this;
        $obj->number = $number;

        return $obj;
    }
}
