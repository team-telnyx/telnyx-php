<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\PhoneNumber\PhoneNumberType;
use Telnyx\NumberOrders\PhoneNumber\RequirementsStatus;
use Telnyx\NumberOrders\PhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue\FieldType;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   id?: string|null,
 *   bundle_id?: string|null,
 *   country_code?: string|null,
 *   country_iso_alpha2?: string|null,
 *   phone_number?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   record_type?: string|null,
 *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
 *   requirements_met?: bool|null,
 *   requirements_status?: value-of<RequirementsStatus>|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $bundle_id;

    /**
     * Country code of the phone number.
     */
    #[Optional]
    public ?string $country_code;

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Optional]
    public ?string $country_iso_alpha2;

    #[Optional]
    public ?string $phone_number;

    /**
     * Phone number type.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Optional(enum: PhoneNumberType::class)]
    public ?string $phone_number_type;

    #[Optional]
    public ?string $record_type;

    /**
     * @var list<SubNumberOrderRegulatoryRequirementWithValue>|null $regulatory_requirements
     */
    #[Optional(list: SubNumberOrderRegulatoryRequirementWithValue::class)]
    public ?array $regulatory_requirements;

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    #[Optional]
    public ?bool $requirements_met;

    /**
     * Status of document requirements (if applicable).
     *
     * @var value-of<RequirementsStatus>|null $requirements_status
     */
    #[Optional(enum: RequirementsStatus::class)]
    public ?string $requirements_status;

    /**
     * The status of the phone number in the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param list<SubNumberOrderRegulatoryRequirementWithValue|array{
     *   field_type?: value-of<FieldType>|null,
     *   field_value?: string|null,
     *   record_type?: string|null,
     *   requirement_id?: string|null,
     * }> $regulatory_requirements
     * @param RequirementsStatus|value-of<RequirementsStatus> $requirements_status
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $bundle_id = null,
        ?string $country_code = null,
        ?string $country_iso_alpha2 = null,
        ?string $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $record_type = null,
        ?array $regulatory_requirements = null,
        ?bool $requirements_met = null,
        RequirementsStatus|string|null $requirements_status = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $bundle_id && $obj['bundle_id'] = $bundle_id;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $country_iso_alpha2 && $obj['country_iso_alpha2'] = $country_iso_alpha2;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $regulatory_requirements && $obj['regulatory_requirements'] = $regulatory_requirements;
        null !== $requirements_met && $obj['requirements_met'] = $requirements_met;
        null !== $requirements_status && $obj['requirements_status'] = $requirements_status;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withBundleID(string $bundleID): self
    {
        $obj = clone $this;
        $obj['bundle_id'] = $bundleID;

        return $obj;
    }

    /**
     * Country code of the phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj['country_iso_alpha2'] = $countryISOAlpha2;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirementWithValue|array{
     *   field_type?: value-of<FieldType>|null,
     *   field_value?: string|null,
     *   record_type?: string|null,
     *   requirement_id?: string|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatory_requirements'] = $regulatoryRequirements;

        return $obj;
    }

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirements_met'] = $requirementsMet;

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
        $obj['requirements_status'] = $requirementsStatus;

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
        $obj['status'] = $status;

        return $obj;
    }
}
