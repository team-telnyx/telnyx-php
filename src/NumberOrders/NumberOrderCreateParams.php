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
 * @phpstan-import-type PhoneNumberShape from \Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber
 *
 * @phpstan-type NumberOrderCreateParamsShape = array{
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   customerReference?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumbers?: list<\Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber|PhoneNumberShape>|null,
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
     * @param list<PhoneNumber|PhoneNumberShape>|null $phoneNumbers
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
    ): self {
        $self = new self;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * @param list<PhoneNumber|PhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
