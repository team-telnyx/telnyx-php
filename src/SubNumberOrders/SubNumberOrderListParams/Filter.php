<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count].
 *
 * @phpstan-type FilterShape = array{
 *   countryCode?: string|null,
 *   orderRequestID?: string|null,
 *   phoneNumberType?: string|null,
 *   phoneNumbersCount?: int|null,
 *   status?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * ISO alpha-2 country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * ID of the number order the sub number order belongs to.
     */
    #[Optional('order_request_id')]
    public ?string $orderRequestID;

    /**
     * Phone Number Type.
     */
    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    /**
     * Amount of numbers in the sub number order.
     */
    #[Optional('phone_numbers_count')]
    public ?int $phoneNumbersCount;

    /**
     * Filter sub number orders by status.
     */
    #[Optional]
    public ?string $status;

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
        ?string $countryCode = null,
        ?string $orderRequestID = null,
        ?string $phoneNumberType = null,
        ?int $phoneNumbersCount = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $orderRequestID && $self['orderRequestID'] = $orderRequestID;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $phoneNumbersCount && $self['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * ISO alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * ID of the number order the sub number order belongs to.
     */
    public function withOrderRequestID(string $orderRequestID): self
    {
        $self = clone $this;
        $self['orderRequestID'] = $orderRequestID;

        return $self;
    }

    /**
     * Phone Number Type.
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Amount of numbers in the sub number order.
     */
    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $self = clone $this;
        $self['phoneNumbersCount'] = $phoneNumbersCount;

        return $self;
    }

    /**
     * Filter sub number orders by status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
