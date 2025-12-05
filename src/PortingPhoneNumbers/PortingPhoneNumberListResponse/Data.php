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
 * @phpstan-type DataShape = array{
 *   activation_status?: value-of<ActivationStatus>|null,
 *   phone_number?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   portability_status?: value-of<PortabilityStatus>|null,
 *   porting_order_id?: string|null,
 *   porting_order_status?: value-of<PortingOrderStatus>|null,
 *   record_type?: string|null,
 *   requirements_status?: value-of<RequirementsStatus>|null,
 *   support_key?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Activation status.
     *
     * @var value-of<ActivationStatus>|null $activation_status
     */
    #[Api(enum: ActivationStatus::class, optional: true)]
    public ?string $activation_status;

    /**
     * E164 formatted phone number.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * The type of the phone number.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * Specifies whether Telnyx is able to confirm portability this number in the United States & Canada. International phone numbers are provisional by default.
     *
     * @var value-of<PortabilityStatus>|null $portability_status
     */
    #[Api(enum: PortabilityStatus::class, optional: true)]
    public ?string $portability_status;

    /**
     * Identifies the associated port request.
     */
    #[Api(optional: true)]
    public ?string $porting_order_id;

    /**
     * The current status of the porting order.
     *
     * @var value-of<PortingOrderStatus>|null $porting_order_status
     */
    #[Api(enum: PortingOrderStatus::class, optional: true)]
    public ?string $porting_order_status;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The current status of the requirements in a INTL porting order.
     *
     * @var value-of<RequirementsStatus>|null $requirements_status
     */
    #[Api(enum: RequirementsStatus::class, optional: true)]
    public ?string $requirements_status;

    /**
     * A key to reference this porting order when contacting Telnyx customer support.
     */
    #[Api(optional: true)]
    public ?string $support_key;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activation_status
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param PortabilityStatus|value-of<PortabilityStatus> $portability_status
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $porting_order_status
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirements_status
     */
    public static function with(
        ActivationStatus|string|null $activation_status = null,
        ?string $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        PortabilityStatus|string|null $portability_status = null,
        ?string $porting_order_id = null,
        PortingOrderStatus|string|null $porting_order_status = null,
        ?string $record_type = null,
        RequirementsStatus|string|null $requirements_status = null,
        ?string $support_key = null,
    ): self {
        $obj = new self;

        null !== $activation_status && $obj['activation_status'] = $activation_status;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $portability_status && $obj['portability_status'] = $portability_status;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $porting_order_status && $obj['porting_order_status'] = $porting_order_status;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $requirements_status && $obj['requirements_status'] = $requirements_status;
        null !== $support_key && $obj['support_key'] = $support_key;

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
        $obj['activation_status'] = $activationStatus;

        return $obj;
    }

    /**
     * E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
        $obj['phone_number_type'] = $phoneNumberType;

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
        $obj['portability_status'] = $portabilityStatus;

        return $obj;
    }

    /**
     * Identifies the associated port request.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['porting_order_id'] = $portingOrderID;

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
        $obj['porting_order_status'] = $portingOrderStatus;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

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
        $obj['requirements_status'] = $requirementsStatus;

        return $obj;
    }

    /**
     * A key to reference this porting order when contacting Telnyx customer support.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj['support_key'] = $supportKey;

        return $obj;
    }
}
