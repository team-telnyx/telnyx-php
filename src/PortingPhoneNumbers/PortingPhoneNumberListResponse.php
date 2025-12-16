<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\ActivationStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\PhoneNumberType;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\PortabilityStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\PortingOrderStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\RequirementsStatus;

/**
 * @phpstan-type PortingPhoneNumberListResponseShape = array{
 *   activationStatus?: null|ActivationStatus|value-of<ActivationStatus>,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   portabilityStatus?: null|PortabilityStatus|value-of<PortabilityStatus>,
 *   portingOrderID?: string|null,
 *   portingOrderStatus?: null|PortingOrderStatus|value-of<PortingOrderStatus>,
 *   recordType?: string|null,
 *   requirementsStatus?: null|RequirementsStatus|value-of<RequirementsStatus>,
 *   supportKey?: string|null,
 * }
 */
final class PortingPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<PortingPhoneNumberListResponseShape> */
    use SdkModel;

    /**
     * Activation status.
     *
     * @var value-of<ActivationStatus>|null $activationStatus
     */
    #[Optional('activation_status', enum: ActivationStatus::class)]
    public ?string $activationStatus;

    /**
     * E164 formatted phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * The type of the phone number.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    /**
     * Specifies whether Telnyx is able to confirm portability this number in the United States & Canada. International phone numbers are provisional by default.
     *
     * @var value-of<PortabilityStatus>|null $portabilityStatus
     */
    #[Optional('portability_status', enum: PortabilityStatus::class)]
    public ?string $portabilityStatus;

    /**
     * Identifies the associated port request.
     */
    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    /**
     * The current status of the porting order.
     *
     * @var value-of<PortingOrderStatus>|null $portingOrderStatus
     */
    #[Optional('porting_order_status', enum: PortingOrderStatus::class)]
    public ?string $portingOrderStatus;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The current status of the requirements in a INTL porting order.
     *
     * @var value-of<RequirementsStatus>|null $requirementsStatus
     */
    #[Optional('requirements_status', enum: RequirementsStatus::class)]
    public ?string $requirementsStatus;

    /**
     * A key to reference this porting order when contacting Telnyx customer support.
     */
    #[Optional('support_key')]
    public ?string $supportKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param PortabilityStatus|value-of<PortabilityStatus> $portabilityStatus
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $portingOrderStatus
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirementsStatus
     */
    public static function with(
        ActivationStatus|string|null $activationStatus = null,
        ?string $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        PortabilityStatus|string|null $portabilityStatus = null,
        ?string $portingOrderID = null,
        PortingOrderStatus|string|null $portingOrderStatus = null,
        ?string $recordType = null,
        RequirementsStatus|string|null $requirementsStatus = null,
        ?string $supportKey = null,
    ): self {
        $self = new self;

        null !== $activationStatus && $self['activationStatus'] = $activationStatus;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $portabilityStatus && $self['portabilityStatus'] = $portabilityStatus;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $portingOrderStatus && $self['portingOrderStatus'] = $portingOrderStatus;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementsStatus && $self['requirementsStatus'] = $requirementsStatus;
        null !== $supportKey && $self['supportKey'] = $supportKey;

        return $self;
    }

    /**
     * Activation status.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     */
    public function withActivationStatus(
        ActivationStatus|string $activationStatus
    ): self {
        $self = clone $this;
        $self['activationStatus'] = $activationStatus;

        return $self;
    }

    /**
     * E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The type of the phone number.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Specifies whether Telnyx is able to confirm portability this number in the United States & Canada. International phone numbers are provisional by default.
     *
     * @param PortabilityStatus|value-of<PortabilityStatus> $portabilityStatus
     */
    public function withPortabilityStatus(
        PortabilityStatus|string $portabilityStatus
    ): self {
        $self = clone $this;
        $self['portabilityStatus'] = $portabilityStatus;

        return $self;
    }

    /**
     * Identifies the associated port request.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * The current status of the porting order.
     *
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $portingOrderStatus
     */
    public function withPortingOrderStatus(
        PortingOrderStatus|string $portingOrderStatus
    ): self {
        $self = clone $this;
        $self['portingOrderStatus'] = $portingOrderStatus;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The current status of the requirements in a INTL porting order.
     *
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirementsStatus
     */
    public function withRequirementsStatus(
        RequirementsStatus|string $requirementsStatus
    ): self {
        $self = clone $this;
        $self['requirementsStatus'] = $requirementsStatus;

        return $self;
    }

    /**
     * A key to reference this porting order when contacting Telnyx customer support.
     */
    public function withSupportKey(string $supportKey): self
    {
        $self = clone $this;
        $self['supportKey'] = $supportKey;

        return $self;
    }
}
