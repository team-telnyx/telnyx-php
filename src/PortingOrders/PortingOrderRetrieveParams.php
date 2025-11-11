<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves the details of an existing porting order.
 *
 * @see Telnyx\PortingOrders->retrieve
 *
 * @phpstan-type PortingOrderRetrieveParamsShape = array{
 *   include_phone_numbers?: bool
 * }
 */
final class PortingOrderRetrieveParams implements BaseModel
{
    /** @use SdkModel<PortingOrderRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Include the first 50 phone number objects in the results.
     */
    #[Api(optional: true)]
    public ?bool $include_phone_numbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $include_phone_numbers = null): self
    {
        $obj = new self;

        null !== $include_phone_numbers && $obj->include_phone_numbers = $include_phone_numbers;

        return $obj;
    }

    /**
     * Include the first 50 phone number objects in the results.
     */
    public function withIncludePhoneNumbers(bool $includePhoneNumbers): self
    {
        $obj = clone $this;
        $obj->include_phone_numbers = $includePhoneNumbers;

        return $obj;
    }
}
