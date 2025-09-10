<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PortingOrderRetrieveParams); // set properties as needed
 * $client->portingOrders->retrieve(...$params->toArray());
 * ```
 * Retrieves the details of an existing porting order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders->retrieve(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders->retrieve
 *
 * @phpstan-type porting_order_retrieve_params = array{includePhoneNumbers?: bool}
 */
final class PortingOrderRetrieveParams implements BaseModel
{
    /** @use SdkModel<porting_order_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Include the first 50 phone number objects in the results.
     */
    #[Api(optional: true)]
    public ?bool $includePhoneNumbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includePhoneNumbers = null): self
    {
        $obj = new self;

        null !== $includePhoneNumbers && $obj->includePhoneNumbers = $includePhoneNumbers;

        return $obj;
    }

    /**
     * Include the first 50 phone number objects in the results.
     */
    public function withIncludePhoneNumbers(bool $includePhoneNumbers): self
    {
        $obj = clone $this;
        $obj->includePhoneNumbers = $includePhoneNumbers;

        return $obj;
    }
}
