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

/**
 * @phpstan-import-type SubNumberOrderRegulatoryRequirementWithValueShape from \Telnyx\SubNumberOrderRegulatoryRequirementWithValue
 *
 * @phpstan-type PhoneNumberShape = array{
 *   id?: string|null,
 *   bundleID?: string|null,
 *   countryCode?: string|null,
 *   countryISOAlpha2?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValueShape>|null,
 *   requirementsMet?: bool|null,
 *   requirementsStatus?: null|RequirementsStatus|value-of<RequirementsStatus>,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('bundle_id')]
    public ?string $bundleID;

    /**
     * Country code of the phone number.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    #[Optional('country_iso_alpha2')]
    public ?string $countryISOAlpha2;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Phone number type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * @var list<SubNumberOrderRegulatoryRequirementWithValue>|null $regulatoryRequirements
     */
    #[Optional(
        'regulatory_requirements',
        list: SubNumberOrderRegulatoryRequirementWithValue::class,
    )]
    public ?array $regulatoryRequirements;

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    /**
     * Status of document requirements (if applicable).
     *
     * @var value-of<RequirementsStatus>|null $requirementsStatus
     */
    #[Optional('requirements_status', enum: RequirementsStatus::class)]
    public ?string $requirementsStatus;

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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param list<SubNumberOrderRegulatoryRequirementWithValueShape> $regulatoryRequirements
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $bundleID && $self['bundleID'] = $bundleID;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $countryISOAlpha2 && $self['countryISOAlpha2'] = $countryISOAlpha2;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $requirementsStatus && $self['requirementsStatus'] = $requirementsStatus;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withBundleID(string $bundleID): self
    {
        $self = clone $this;
        $self['bundleID'] = $bundleID;

        return $self;
    }

    /**
     * Country code of the phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the phone number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $self = clone $this;
        $self['countryISOAlpha2'] = $countryISOAlpha2;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Phone number type.
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

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<SubNumberOrderRegulatoryRequirementWithValueShape> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    /**
     * True if all requirements are met for a phone number, false otherwise.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    /**
     * Status of document requirements (if applicable).
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
     * The status of the phone number in the order.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
