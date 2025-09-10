<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\ActivationStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\PhoneNumberType;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\PortabilityStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\PortingOrderStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\RequirementsStatus;

/**
 * @phpstan-type data_alias = array{
 *   activationStatus?: value-of<ActivationStatus>|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   portabilityStatus?: value-of<PortabilityStatus>|null,
 *   portingOrderID?: string|null,
 *   portingOrderStatus?: value-of<PortingOrderStatus>|null,
 *   recordType?: string|null,
 *   requirementsStatus?: value-of<RequirementsStatus>|null,
 *   supportKey?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Activation status.
     *
     * @var value-of<ActivationStatus>|null $activationStatus
     */
    #[Api('activation_status', enum: ActivationStatus::class, optional: true)]
    public ?string $activationStatus;

    /**
     * E164 formatted phone number.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * The type of the phone number.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * Specifies whether Telnyx is able to confirm portability this number in the United States & Canada. International phone numbers are provisional by default.
     *
     * @var value-of<PortabilityStatus>|null $portabilityStatus
     */
    #[Api('portability_status', enum: PortabilityStatus::class, optional: true)]
    public ?string $portabilityStatus;

    /**
     * Identifies the associated port request.
     */
    #[Api('porting_order_id', optional: true)]
    public ?string $portingOrderID;

    /**
     * The current status of the porting order.
     *
     * @var value-of<PortingOrderStatus>|null $portingOrderStatus
     */
    #[Api(
        'porting_order_status',
        enum: PortingOrderStatus::class,
        optional: true
    )]
    public ?string $portingOrderStatus;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The current status of the requirements in a INTL porting order.
     *
     * @var value-of<RequirementsStatus>|null $requirementsStatus
     */
    #[Api('requirements_status', enum: RequirementsStatus::class, optional: true)]
    public ?string $requirementsStatus;

    /**
     * A key to reference this porting order when contacting Telnyx customer support.
     */
    #[Api('support_key', optional: true)]
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
        $obj = new self;

        null !== $activationStatus && $obj->activationStatus = $activationStatus instanceof ActivationStatus ? $activationStatus->value : $activationStatus;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $portabilityStatus && $obj->portabilityStatus = $portabilityStatus instanceof PortabilityStatus ? $portabilityStatus->value : $portabilityStatus;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $portingOrderStatus && $obj->portingOrderStatus = $portingOrderStatus instanceof PortingOrderStatus ? $portingOrderStatus->value : $portingOrderStatus;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $requirementsStatus && $obj->requirementsStatus = $requirementsStatus instanceof RequirementsStatus ? $requirementsStatus->value : $requirementsStatus;
        null !== $supportKey && $obj->supportKey = $supportKey;

        return $obj;
    }

    /**
     * Activation status.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     */
    public function withActivationStatus(
        ActivationStatus|string $activationStatus
    ): self {
        $obj = clone $this;
        $obj->activationStatus = $activationStatus instanceof ActivationStatus ? $activationStatus->value : $activationStatus;

        return $obj;
    }

    /**
     * E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The type of the phone number.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;

        return $obj;
    }

    /**
     * Specifies whether Telnyx is able to confirm portability this number in the United States & Canada. International phone numbers are provisional by default.
     *
     * @param PortabilityStatus|value-of<PortabilityStatus> $portabilityStatus
     */
    public function withPortabilityStatus(
        PortabilityStatus|string $portabilityStatus
    ): self {
        $obj = clone $this;
        $obj->portabilityStatus = $portabilityStatus instanceof PortabilityStatus ? $portabilityStatus->value : $portabilityStatus;

        return $obj;
    }

    /**
     * Identifies the associated port request.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * The current status of the porting order.
     *
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $portingOrderStatus
     */
    public function withPortingOrderStatus(
        PortingOrderStatus|string $portingOrderStatus
    ): self {
        $obj = clone $this;
        $obj->portingOrderStatus = $portingOrderStatus instanceof PortingOrderStatus ? $portingOrderStatus->value : $portingOrderStatus;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The current status of the requirements in a INTL porting order.
     *
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirementsStatus
     */
    public function withRequirementsStatus(
        RequirementsStatus|string $requirementsStatus
    ): self {
        $obj = clone $this;
        $obj->requirementsStatus = $requirementsStatus instanceof RequirementsStatus ? $requirementsStatus->value : $requirementsStatus;

        return $obj;
    }

    /**
     * A key to reference this porting order when contacting Telnyx customer support.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj->supportKey = $supportKey;

        return $obj;
    }
}
