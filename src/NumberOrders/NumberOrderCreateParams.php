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
 * @phpstan-type number_order_create_params = array{
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   messagingProfileID?: string,
 *   phoneNumbers?: list<PhoneNumber>,
 * }
 */
final class NumberOrderCreateParams implements BaseModel
{
    /** @use SdkModel<number_order_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

    /** @var list<PhoneNumber>|null $phoneNumbers */
    #[Api('phone_numbers', list: PhoneNumber::class, optional: true)]
    public ?array $phoneNumbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumber> $phoneNumbers
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<PhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
