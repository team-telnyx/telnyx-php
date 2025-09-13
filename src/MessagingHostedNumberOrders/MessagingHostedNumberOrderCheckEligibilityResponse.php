<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber;

/**
 * @phpstan-type messaging_hosted_number_order_check_eligibility_response = array{
 *   phoneNumbers?: list<PhoneNumber>
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MessagingHostedNumberOrderCheckEligibilityResponse implements BaseModel
{
    /** @use SdkModel<messaging_hosted_number_order_check_eligibility_response> */
    use SdkModel;

    /**
     * List of phone numbers with their eligibility status.
     *
     * @var list<PhoneNumber>|null $phoneNumbers
     */
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
    public static function with(?array $phoneNumbers = null): self
    {
        $obj = new self;

        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * List of phone numbers with their eligibility status.
     *
     * @param list<PhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
