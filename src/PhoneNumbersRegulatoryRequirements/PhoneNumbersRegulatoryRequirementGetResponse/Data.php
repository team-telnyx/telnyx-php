<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegionInformation;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-import-type RegionInformationShape from \Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegionInformation
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement
 *
 * @phpstan-type DataShape = array{
 *   phoneNumber?: string|null,
 *   phoneNumberType?: string|null,
 *   recordType?: string|null,
 *   regionInformation?: list<RegionInformation|RegionInformationShape>|null,
 *   regulatoryRequirements?: list<RegulatoryRequirement|RegulatoryRequirementShape>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<RegionInformation>|null $regionInformation */
    #[Optional('region_information', list: RegionInformation::class)]
    public ?array $regionInformation;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Optional('regulatory_requirements', list: RegulatoryRequirement::class)]
    public ?array $regulatoryRequirements;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RegionInformation|RegionInformationShape>|null $regionInformation
     * @param list<RegulatoryRequirement|RegulatoryRequirementShape>|null $regulatoryRequirements
     */
    public static function with(
        ?string $phoneNumber = null,
        ?string $phoneNumberType = null,
        ?string $recordType = null,
        ?array $regionInformation = null,
        ?array $regulatoryRequirements = null,
    ): self {
        $self = new self;

        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regionInformation && $self['regionInformation'] = $regionInformation;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;

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
     * @param list<RegionInformation|RegionInformationShape> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $self = clone $this;
        $self['regionInformation'] = $regionInformation;

        return $self;
    }

    /**
     * @param list<RegulatoryRequirement|RegulatoryRequirementShape> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }
}
