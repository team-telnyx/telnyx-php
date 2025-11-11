<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber;

/**
 * Creates a phone number order.
 *
 * @see Telnyx\NumberOrders->create
 *
 * @phpstan-type NumberOrderCreateParamsShape = array{
 *   billing_group_id?: string,
 *   connection_id?: string,
 *   customer_reference?: string,
 *   messaging_profile_id?: string,
 *   phone_numbers?: list<PhoneNumber>,
 * }
 */
final class NumberOrderCreateParams implements BaseModel
{
    /** @use SdkModel<NumberOrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $billing_group_id;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    /** @var list<PhoneNumber>|null $phone_numbers */
    #[Api(list: PhoneNumber::class, optional: true)]
    public ?array $phone_numbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumber> $phone_numbers
     */
    public static function with(
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        ?string $messaging_profile_id = null,
        ?array $phone_numbers = null,
    ): self {
        $obj = new self;

        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $messaging_profile_id && $obj->messaging_profile_id = $messaging_profile_id;
        null !== $phone_numbers && $obj->phone_numbers = $phone_numbers;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billing_group_id = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messaging_profile_id = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<PhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }
}
