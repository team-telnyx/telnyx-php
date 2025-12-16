<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers\PhoneNumber;

/**
 * @phpstan-import-type PhoneNumberShape from \Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers\PhoneNumber
 *
 * @phpstan-type PhoneNumbersShape = array{
 *   carrierName?: string|null,
 *   countryCode?: string|null,
 *   phoneNumber?: null|PhoneNumber|PhoneNumberShape,
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
     * @param PhoneNumberShape $phoneNumber
     */
    public static function with(
        ?string $carrierName = null,
        ?string $countryCode = null,
        PhoneNumber|array|null $phoneNumber = null,
    ): self {
        $self = new self;

        null !== $carrierName && $self['carrierName'] = $carrierName;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Filter results by old service provider.
     */
    public function withCarrierName(string $carrierName): self
    {
        $self = clone $this;
        $self['carrierName'] = $carrierName;

        return $self;
    }

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Phone number pattern filtering operations.
     *
     * @param PhoneNumberShape $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
