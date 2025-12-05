<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber\EligibleStatus;

/**
 * @phpstan-type MessagingHostedNumberOrderCheckEligibilityResponseShape = array{
 *   phone_numbers?: list<PhoneNumber>|null
 * }
 */
final class MessagingHostedNumberOrderCheckEligibilityResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingHostedNumberOrderCheckEligibilityResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * List of phone numbers with their eligibility status.
     *
     * @var list<PhoneNumber>|null $phone_numbers
     */
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
     * @param list<PhoneNumber|array{
     *   detail?: string|null,
     *   eligible?: bool|null,
     *   eligible_status?: value-of<EligibleStatus>|null,
     *   phone_number?: string|null,
     * }> $phone_numbers
     */
    public static function with(?array $phone_numbers = null): self
    {
        $obj = new self;

        null !== $phone_numbers && $obj['phone_numbers'] = $phone_numbers;

        return $obj;
    }

    /**
     * List of phone numbers with their eligibility status.
     *
     * @param list<PhoneNumber|array{
     *   detail?: string|null,
     *   eligible?: bool|null,
     *   eligible_status?: value-of<EligibleStatus>|null,
     *   phone_number?: string|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }
}
