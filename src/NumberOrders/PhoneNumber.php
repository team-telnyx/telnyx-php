<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\PhoneNumber\PhoneNumberType;
use Telnyx\NumberOrders\PhoneNumber\RequirementsStatus;
use Telnyx\NumberOrders\PhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;

/**
 * @phpstan-type phone_number = array{
 *   id?: string|null,
 *   bundleID?: string|null,
 *   countryCode?: string|null,
 *   countryISOAlpha2?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
 *   requirementsMet?: bool|null,
 *   requirementsStatus?: value-of<RequirementsStatus>|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<phone_number> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api('bundle_id', optional: true)]
    public ?string $bundleID;

    /**
     * Country code of the phone number.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Api('country_iso_alpha2', optional: true)]
    public ?string $countryISOAlpha2;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Phone number type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * @var list<SubNumberOrderRegulatoryRequirementWithValue>|null $regulatoryRequirements
     */
    #[Api(
        'regulatory_requirements',
        list: SubNumberOrderRegulatoryRequirementWithValue::class,
        optional: true,
    )]
    public ?array $regulatoryRequirements;

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    #[Api('requirements_met', optional: true)]
    public ?bool $requirementsMet;

    /**
     * Status of document requirements (if applicable).
     *
     * @var value-of<RequirementsStatus>|null $requirementsStatus
     */
    #[Api('requirements_status', enum: RequirementsStatus::class, optional: true)]
    public ?string $requirementsStatus;

    /**
     * The status of the phone number in the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param list<SubNumberOrderRegulatoryRequirementWithValue> $regulatoryRequirements
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirementsStatus
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $bundleID = null,
        ?string $countryCode = null,
        ?string $countryISOAlpha2 = null,
        ?string $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $recordType = null,
        ?array $regulatoryRequirements = null,
        ?bool $requirementsMet = null,
        RequirementsStatus|string|null $requirementsStatus = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $bundleID && $obj->bundleID = $bundleID;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $countryISOAlpha2 && $obj->countryISOAlpha2 = $countryISOAlpha2;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;
        null !== $requirementsMet && $obj->requirementsMet = $requirementsMet;
        null !== $requirementsStatus && $obj->requirementsStatus = $requirementsStatus instanceof RequirementsStatus ? $requirementsStatus->value : $requirementsStatus;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withBundleID(string $bundleID): self
    {
        $obj = clone $this;
        $obj->bundleID = $bundleID;

        return $obj;
    }

    /**
     * Country code of the phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj->countryISOAlpha2 = $countryISOAlpha2;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Phone number type.
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

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirementWithValue> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj->requirementsMet = $requirementsMet;

        return $obj;
    }

    /**
     * Status of document requirements (if applicable).
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
     * The status of the phone number in the order.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
