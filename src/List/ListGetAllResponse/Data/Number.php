<?php

declare(strict_types=1);

namespace Telnyx\List\ListGetAllResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NumberShape = array{country?: string|null, number?: string|null}
 */
final class Number implements BaseModel
{
    /** @use SdkModel<NumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $country;

    #[Optional]
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

        null !== $country && $obj['country'] = $country;
        null !== $number && $obj['number'] = $number;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    public function withNumber(string $number): self
    {
        $obj = clone $this;
        $obj['number'] = $number;

        return $obj;
    }
}
