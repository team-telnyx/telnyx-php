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
 * $params = (new PortingOrderCreateParams); // set properties as needed
 * $client->portingOrders->create(...$params->toArray());
 * ```
 * Creates a new porting order object.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders->create(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders->create
 *
 * @phpstan-type porting_order_create_params = array{
 *   phoneNumbers: list<string>,
 *   customerGroupReference?: string,
 *   customerReference?: string,
 * }
 */
final class PortingOrderCreateParams implements BaseModel
{
    /** @use SdkModel<porting_order_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The list of +E.164 formatted phone numbers.
     *
     * @var list<string> $phoneNumbers
     */
    #[Api('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    #[Api('customer_group_reference', optional: true)]
    public ?string $customerGroupReference;

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * `new PortingOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortingOrderCreateParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortingOrderCreateParams)->withPhoneNumbers(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phoneNumbers
     */
    public static function with(
        array $phoneNumbers,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
    ): self {
        $obj = new self;

        $obj->phoneNumbers = $phoneNumbers;

        null !== $customerGroupReference && $obj->customerGroupReference = $customerGroupReference;
        null !== $customerReference && $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * The list of +E.164 formatted phone numbers.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj->customerGroupReference = $customerGroupReference;

        return $obj;
    }

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }
}
