<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[country_code].
 *
 * @phpstan-type filter_alias = array{countryCode?: string}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Country code of the order phone number.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $countryCode = null): self
    {
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Country code of the order phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }
}
