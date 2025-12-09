<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Check eligibility of phone numbers for hosted messaging.
 *
 * @see Telnyx\Services\MessagingHostedNumberOrdersService::checkEligibility()
 *
 * @phpstan-type MessagingHostedNumberOrderCheckEligibilityParamsShape = array{
 *   phoneNumbers: list<string>
 * }
 */
final class MessagingHostedNumberOrderCheckEligibilityParams implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderCheckEligibilityParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of phone numbers to check eligibility.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new MessagingHostedNumberOrderCheckEligibilityParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingHostedNumberOrderCheckEligibilityParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingHostedNumberOrderCheckEligibilityParams)->withPhoneNumbers(...)
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
    public static function with(array $phoneNumbers): self
    {
        $obj = new self;

        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * List of phone numbers to check eligibility.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }
}
