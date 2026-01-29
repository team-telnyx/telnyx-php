<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new porting order object.
 *
 * @see Telnyx\Services\PortingOrdersService::create()
 *
 * @phpstan-type PortingOrderCreateParamsShape = array{
 *   phoneNumbers: list<string>,
 *   customerGroupReference?: string|null,
 *   customerReference?: string|null,
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
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    #[Optional('customer_group_reference')]
    public ?string $customerGroupReference;

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    #[Optional('customer_reference', nullable: true)]
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
        $self = new self;

        $self['phoneNumbers'] = $phoneNumbers;

        null !== $customerGroupReference && $self['customerGroupReference'] = $customerGroupReference;
        null !== $customerReference && $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * The list of +E.164 formatted phone numbers.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $self = clone $this;
        $self['customerGroupReference'] = $customerGroupReference;

        return $self;
    }

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }
}
