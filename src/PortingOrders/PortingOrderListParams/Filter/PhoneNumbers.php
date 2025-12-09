<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers\PhoneNumber;

/**
 * @phpstan-type PhoneNumbersShape = array{
 *   carrierName?: string|null,
 *   countryCode?: string|null,
 *   phoneNumber?: PhoneNumber|null,
 * }
 */
final class PhoneNumbers implements BaseModel
{
    /** @use SdkModel<PhoneNumbersShape> */
    use SdkModel;

    /**
     * Filter results by old service provider.
     */
    #[Optional('carrier_name')]
    public ?string $carrierName;

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Phone number pattern filtering operations.
     */
    #[Optional('phone_number')]
    public ?PhoneNumber $phoneNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumber|array{contains?: string|null} $phoneNumber
     */
    public static function with(
        ?string $carrierName = null,
        ?string $countryCode = null,
        PhoneNumber|array|null $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $carrierName && $obj['carrierName'] = $carrierName;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Filter results by old service provider.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj['carrierName'] = $carrierName;

        return $obj;
    }

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

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
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
