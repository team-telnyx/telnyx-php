<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers\PhoneNumber;

/**
 * @phpstan-type PhoneNumbersShape = array{
 *   carrier_name?: string|null,
 *   country_code?: string|null,
 *   phone_number?: PhoneNumber|null,
 * }
 */
final class PhoneNumbers implements BaseModel
{
    /** @use SdkModel<PhoneNumbersShape> */
    use SdkModel;

    /**
     * Filter results by old service provider.
     */
    #[Api(optional: true)]
    public ?string $carrier_name;

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Phone number pattern filtering operations.
     */
    #[Api(optional: true)]
    public ?PhoneNumber $phone_number;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumber|array{contains?: string|null} $phone_number
     */
    public static function with(
        ?string $carrier_name = null,
        ?string $country_code = null,
        PhoneNumber|array|null $phone_number = null,
    ): self {
        $obj = new self;

        null !== $carrier_name && $obj['carrier_name'] = $carrier_name;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * Filter results by old service provider.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj['carrier_name'] = $carrierName;

        return $obj;
    }

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * Phone number pattern filtering operations.
     *
     * @param PhoneNumber|array{contains?: string|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
