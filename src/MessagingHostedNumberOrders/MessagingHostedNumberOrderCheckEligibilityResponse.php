<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber\EligibleStatus;

/**
 * @phpstan-type MessagingHostedNumberOrderCheckEligibilityResponseShape = array{
 *   phoneNumbers?: list<PhoneNumber>|null
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
     * @param list<PhoneNumber|array{
     *   detail?: string|null,
     *   eligible?: bool|null,
     *   eligibleStatus?: value-of<EligibleStatus>|null,
     *   phoneNumber?: string|null,
     * }> $phoneNumbers
     */
    public static function with(?array $phoneNumbers = null): self
    {
        $obj = new self;

        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * List of phone numbers with their eligibility status.
     *
     * @param list<PhoneNumber|array{
     *   detail?: string|null,
     *   eligible?: bool|null,
     *   eligibleStatus?: value-of<EligibleStatus>|null,
     *   phoneNumber?: string|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }
}
