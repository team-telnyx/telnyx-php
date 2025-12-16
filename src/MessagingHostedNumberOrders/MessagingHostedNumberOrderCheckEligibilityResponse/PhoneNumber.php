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
 *   eligibleStatus?: null|EligibleStatus|value-of<EligibleStatus>,
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
        $self = new self;

        null !== $detail && $self['detail'] = $detail;
        null !== $eligible && $self['eligible'] = $eligible;
        null !== $eligibleStatus && $self['eligibleStatus'] = $eligibleStatus;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Detailed information about the eligibility status.
     */
    public function withDetail(string $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    /**
     * Whether the phone number is eligible for hosted messaging.
     */
    public function withEligible(bool $eligible): self
    {
        $self = clone $this;
        $self['eligible'] = $eligible;

        return $self;
    }

    /**
     * The eligibility status of the phone number.
     *
     * @param EligibleStatus|value-of<EligibleStatus> $eligibleStatus
     */
    public function withEligibleStatus(
        EligibleStatus|string $eligibleStatus
    ): self {
        $self = clone $this;
        $self['eligibleStatus'] = $eligibleStatus;

        return $self;
    }

    /**
     * The phone number in e164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
