<?php

declare(strict_types=1);

namespace Telnyx\List_\ListGetAllResponse\Data;

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
        $self = new self;

        null !== $country && $self['country'] = $country;
        null !== $number && $self['number'] = $number;

        return $self;
    }

    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withNumber(string $number): self
    {
        $self = clone $this;
        $self['number'] = $number;

        return $self;
    }
}
