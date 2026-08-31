<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CountryShape = array{countryCode: string}
 */
final class Country implements BaseModel
{
    /** @use SdkModel<CountryShape> */
    use SdkModel;

    /**
     * ISO 3166-1 Alpha-2 Country Code.
     */
    #[Required('country_code')]
    public string $countryCode;

    /**
     * `new Country()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Country::with(countryCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Country)->withCountryCode(...)
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
    public static function with(string $countryCode): self
    {
        $self = new self;

        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * ISO 3166-1 Alpha-2 Country Code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }
}
