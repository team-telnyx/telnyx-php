<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[country_code].
 *
 * @phpstan-type FilterShape = array{country_code?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Country code of the order phone number.
     */
    #[Optional]
    public ?string $country_code;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $country_code = null): self
    {
        $obj = new self;

        null !== $country_code && $obj['country_code'] = $country_code;

        return $obj;
    }

    /**
     * Country code of the order phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }
}
