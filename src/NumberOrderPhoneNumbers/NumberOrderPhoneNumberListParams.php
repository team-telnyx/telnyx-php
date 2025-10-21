<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter;

/**
 * Get a list of phone numbers associated to orders.
 *
 * @see Telnyx\NumberOrderPhoneNumbers->list
 *
 * @phpstan-type number_order_phone_number_list_params = array{filter?: Filter}
 */
final class NumberOrderPhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<number_order_phone_number_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
