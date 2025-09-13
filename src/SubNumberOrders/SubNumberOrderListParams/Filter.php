<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count].
 *
 * @phpstan-type filter_alias = array{
 *   countryCode?: string,
 *   orderRequestID?: string,
 *   phoneNumberType?: string,
 *   phoneNumbersCount?: int,
 *   status?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * ISO alpha-2 country code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * ID of the number order the sub number order belongs to.
     */
    #[Api('order_request_id', optional: true)]
    public ?string $orderRequestID;

    /**
     * Phone Number Type.
     */
    #[Api('phone_number_type', optional: true)]
    public ?string $phoneNumberType;

    /**
     * Amount of numbers in the sub number order.
     */
    #[Api('phone_numbers_count', optional: true)]
    public ?int $phoneNumbersCount;

    /**
     * Filter sub number orders by status.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $orderRequestID && $obj->orderRequestID = $orderRequestID;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType;
        null !== $phoneNumbersCount && $obj->phoneNumbersCount = $phoneNumbersCount;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * ISO alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * ID of the number order the sub number order belongs to.
     */
    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj->orderRequestID = $orderRequestID;

        return $obj;
    }

    /**
     * Phone Number Type.
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj->phoneNumberType = $phoneNumberType;

        return $obj;
    }

    /**
     * Amount of numbers in the sub number order.
     */
    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj->phoneNumbersCount = $phoneNumbersCount;

        return $obj;
    }

    /**
     * Filter sub number orders by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
