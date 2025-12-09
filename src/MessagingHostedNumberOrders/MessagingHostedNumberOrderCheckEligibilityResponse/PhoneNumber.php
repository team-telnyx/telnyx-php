<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse\PhoneNumber\EligibleStatus;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   detail?: string|null,
 *   eligible?: bool|null,
 *   eligibleStatus?: value-of<EligibleStatus>|null,
 *   phoneNumber?: string|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * Detailed information about the eligibility status.
     */
    #[Optional]
    public ?string $detail;

    /**
     * Whether the phone number is eligible for hosted messaging.
     */
    #[Optional]
    public ?bool $eligible;

    /**
     * The eligibility status of the phone number.
     *
     * @var value-of<EligibleStatus>|null $eligibleStatus
     */
    #[Optional('eligible_status', enum: EligibleStatus::class)]
    public ?string $eligibleStatus;

    /**
     * The phone number in e164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EligibleStatus|value-of<EligibleStatus> $eligibleStatus
     */
    public static function with(
        ?string $detail = null,
        ?bool $eligible = null,
        EligibleStatus|string|null $eligibleStatus = null,
        ?string $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $detail && $obj['detail'] = $detail;
        null !== $eligible && $obj['eligible'] = $eligible;
        null !== $eligibleStatus && $obj['eligibleStatus'] = $eligibleStatus;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Detailed information about the eligibility status.
     */
    public function withDetail(string $detail): self
    {
        $obj = clone $this;
        $obj['detail'] = $detail;

        return $obj;
    }

    /**
     * Whether the phone number is eligible for hosted messaging.
     */
    public function withEligible(bool $eligible): self
    {
        $obj = clone $this;
        $obj['eligible'] = $eligible;

        return $obj;
    }

    /**
     * The eligibility status of the phone number.
     *
     * @param EligibleStatus|value-of<EligibleStatus> $eligibleStatus
     */
    public function withEligibleStatus(
        EligibleStatus|string $eligibleStatus
    ): self {
        $obj = clone $this;
        $obj['eligibleStatus'] = $eligibleStatus;

        return $obj;
    }

    /**
     * The phone number in e164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
