<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber;

/**
 * Creates a phone number order.
 *
 * @see Telnyx\Services\NumberOrdersService::create()
 *
 * @phpstan-type NumberOrderCreateParamsShape = array{
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   messagingProfileID?: string,
 *   phoneNumbers?: list<\Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber|array{
 *     phoneNumber: string,
 *     bundleID?: string|null,
 *     requirementGroupID?: string|null,
 *   }>,
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
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * @var list<PhoneNumber>|null $phoneNumbers
     */
    #[Optional(
        'phone_numbers',
        list: PhoneNumber::class,
    )]
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
     * @param list<PhoneNumber|array{
     *   phoneNumber: string, bundleID?: string|null, requirementGroupID?: string|null
     * }> $phoneNumbers
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<PhoneNumber|array{
     *   phoneNumber: string, bundleID?: string|null, requirementGroupID?: string|null
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }
}
