<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegionInformation;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type data_alias = array{
 *   phoneNumber?: string,
 *   phoneNumberType?: string,
 *   recordType?: string,
 *   regionInformation?: list<RegionInformation>,
 *   regulatoryRequirements?: list<RegulatoryRequirement>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    #[Api('phone_number_type', optional: true)]
    public ?string $phoneNumberType;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /** @var list<RegionInformation>|null $regionInformation */
    #[Api('region_information', list: RegionInformation::class, optional: true)]
    public ?array $regionInformation;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Api(
        'regulatory_requirements',
        list: RegulatoryRequirement::class,
        optional: true,
    )]
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
     * @param list<RegionInformation> $regionInformation
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public static function with(
        ?string $phoneNumber = null,
        ?string $phoneNumberType = null,
        ?string $recordType = null,
        ?array $regionInformation = null,
        ?array $regulatoryRequirements = null,
    ): self {
        $obj = new self;

        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $regionInformation && $obj->regionInformation = $regionInformation;
        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj->phoneNumberType = $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param list<RegionInformation> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $obj = clone $this;
        $obj->regionInformation = $regionInformation;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }
}
