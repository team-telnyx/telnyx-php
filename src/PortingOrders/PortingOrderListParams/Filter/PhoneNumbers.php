<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers\PhoneNumber;

/**
 * @phpstan-type PhoneNumbersShape = array{
 *   carrierName?: string, countryCode?: string, phoneNumber?: PhoneNumber
 * }
 */
final class PhoneNumbers implements BaseModel
{
    /** @use SdkModel<PhoneNumbersShape> */
    use SdkModel;

    /**
     * Filter results by old service provider.
     */
    #[Api('carrier_name', optional: true)]
    public ?string $carrierName;

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Phone number pattern filtering operations.
     */
    #[Api('phone_number', optional: true)]
    public ?PhoneNumber $phoneNumber;

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
        ?string $carrierName = null,
        ?string $countryCode = null,
        ?PhoneNumber $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $carrierName && $obj->carrierName = $carrierName;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Filter results by old service provider.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrierName = $carrierName;

        return $obj;
    }

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Phone number pattern filtering operations.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
