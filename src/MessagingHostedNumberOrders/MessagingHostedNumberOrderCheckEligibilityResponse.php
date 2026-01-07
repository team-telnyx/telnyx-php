<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber;

/**
 * @phpstan-import-type PhoneNumberShape from \Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber
 *
 * @phpstan-type MessagingHostedNumberOrderCheckEligibilityResponseShape = array{
 *   phoneNumbers?: list<PhoneNumber|PhoneNumberShape>|null
 * }
 */
final class MessagingHostedNumberOrderCheckEligibilityResponse implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderCheckEligibilityResponseShape> */
    use SdkModel;

    /**
     * List of phone numbers with their eligibility status.
     *
     * @var list<PhoneNumber>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: PhoneNumber::class)]
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
    public static function with(?array $phoneNumbers = null): self
    {
        $self = new self;

        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * List of phone numbers with their eligibility status.
     *
     * @param list<PhoneNumber|PhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
