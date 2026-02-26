<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CountryCoverageShape from \Telnyx\CountryCoverage\CountryCoverage
 *
 * @phpstan-type CountryCoverageGetCountryResponseShape = array{
 *   data?: null|CountryCoverage|CountryCoverageShape
 * }
 */
final class CountryCoverageGetCountryResponse implements BaseModel
{
    /** @use SdkModel<CountryCoverageGetCountryResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CountryCoverage $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CountryCoverage|CountryCoverageShape|null $data
     */
    public static function with(CountryCoverage|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CountryCoverage|CountryCoverageShape $data
     */
    public function withData(CountryCoverage|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
