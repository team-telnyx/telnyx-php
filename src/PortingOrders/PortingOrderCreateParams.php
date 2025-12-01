<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new porting order object.
 *
 * @see Telnyx\Services\PortingOrdersService::create()
 *
 * @phpstan-type PortingOrderCreateParamsShape = array{
 *   phone_numbers: list<string>,
 *   customer_group_reference?: string,
 *   customer_reference?: string|null,
 * }
 */
final class PortingOrderCreateParams implements BaseModel
{
    /** @use SdkModel<PortingOrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The list of +E.164 formatted phone numbers.
     *
     * @var list<string> $phone_numbers
     */
    #[Api(list: 'string')]
    public array $phone_numbers;

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    #[Api(optional: true)]
    public ?string $customer_group_reference;

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $customer_reference;

    /**
     * `new PortingOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortingOrderCreateParams::with(phone_numbers: ...)
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
     * @param list<string> $phone_numbers
     */
    public static function with(
        array $phone_numbers,
        ?string $customer_group_reference = null,
        ?string $customer_reference = null,
    ): self {
        $obj = new self;

        $obj->phone_numbers = $phone_numbers;

        null !== $customer_group_reference && $obj->customer_group_reference = $customer_group_reference;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;

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
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj->customer_group_reference = $customerGroupReference;

        return $obj;
    }

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }
}
