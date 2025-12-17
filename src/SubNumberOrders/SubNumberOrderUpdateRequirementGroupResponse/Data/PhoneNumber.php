<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber\RegulatoryRequirement;

/**
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber\RegulatoryRequirement
 *
 * @phpstan-type PhoneNumberShape = array{
 *   id?: string|null,
 *   bundleID?: string|null,
 *   countryCode?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: string|null,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirementShape>|null,
 *   requirementsMet?: bool|null,
 *   requirementsStatus?: string|null,
 *   status?: string|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('bundle_id', nullable: true)]
    public ?string $bundleID;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * @var list<RegulatoryRequirement>|null $regulatoryRequirements
     */
    #[Optional(
        'regulatory_requirements',
        list: RegulatoryRequirement::class,
    )]
    public ?array $regulatoryRequirements;

    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    #[Optional('requirements_status')]
    public ?string $requirementsStatus;

    #[Optional]
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
     * @param list<RegulatoryRequirementShape>|null $regulatoryRequirements
     */
    public static function with(
        ?string $id = null,
        ?string $bundleID = null,
        ?string $countryCode = null,
        ?string $phoneNumber = null,
        ?string $phoneNumberType = null,
        ?string $recordType = null,
        ?array $regulatoryRequirements = null,
        ?bool $requirementsMet = null,
        ?string $requirementsStatus = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $bundleID && $self['bundleID'] = $bundleID;
        null !== $countryCode && $self['countryCode'] = $countryCode;
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

    public function withBundleID(?string $bundleID): self
    {
        $self = clone $this;
        $self['bundleID'] = $bundleID;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
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
     * @param list<RegulatoryRequirementShape> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    public function withRequirementsStatus(string $requirementsStatus): self
    {
        $self = clone $this;
        $self['requirementsStatus'] = $requirementsStatus;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
