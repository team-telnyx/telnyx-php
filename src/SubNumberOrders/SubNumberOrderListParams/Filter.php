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
 *   country_code?: string|null,
 *   order_request_id?: string|null,
 *   phone_number_type?: string|null,
 *   phone_numbers_count?: int|null,
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
    #[Optional]
    public ?string $country_code;

    /**
     * ID of the number order the sub number order belongs to.
     */
    #[Optional]
    public ?string $order_request_id;

    /**
     * Phone Number Type.
     */
    #[Optional]
    public ?string $phone_number_type;

    /**
     * Amount of numbers in the sub number order.
     */
    #[Optional]
    public ?int $phone_numbers_count;

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
        ?string $country_code = null,
        ?string $order_request_id = null,
        ?string $phone_number_type = null,
        ?int $phone_numbers_count = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $order_request_id && $obj['order_request_id'] = $order_request_id;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $phone_numbers_count && $obj['phone_numbers_count'] = $phone_numbers_count;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * ID of the number order the sub number order belongs to.
     */
    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj['order_request_id'] = $orderRequestID;

        return $obj;
    }

    /**
     * Phone Number Type.
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Amount of numbers in the sub number order.
     */
    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj['phone_numbers_count'] = $phoneNumbersCount;

        return $obj;
    }

    /**
     * Filter sub number orders by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
