<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegionInformation;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type DataShape = array{
 *   phone_number?: string|null,
 *   phone_number_type?: string|null,
 *   record_type?: string|null,
 *   region_information?: list<RegionInformation>|null,
 *   regulatory_requirements?: list<RegulatoryRequirement>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $phone_number;

    #[Optional]
    public ?string $phone_number_type;

    #[Optional]
    public ?string $record_type;

    /** @var list<RegionInformation>|null $region_information */
    #[Optional(list: RegionInformation::class)]
    public ?array $region_information;

    /** @var list<RegulatoryRequirement>|null $regulatory_requirements */
    #[Optional(list: RegulatoryRequirement::class)]
    public ?array $regulatory_requirements;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RegionInformation|array{
     *   region_name?: string|null, region_type?: string|null
     * }> $region_information
     * @param list<RegulatoryRequirement|array{
     *   id?: string|null,
     *   acceptance_criteria?: AcceptanceCriteria|null,
     *   description?: string|null,
     *   example?: string|null,
     *   field_type?: string|null,
     *   label?: string|null,
     *   record_type?: string|null,
     * }> $regulatory_requirements
     */
    public static function with(
        ?string $phone_number = null,
        ?string $phone_number_type = null,
        ?string $record_type = null,
        ?array $region_information = null,
        ?array $regulatory_requirements = null,
    ): self {
        $obj = new self;

        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $region_information && $obj['region_information'] = $region_information;
        null !== $regulatory_requirements && $obj['regulatory_requirements'] = $regulatory_requirements;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
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
     * @param list<RegionInformation|array{
     *   region_name?: string|null, region_type?: string|null
     * }> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $obj = clone $this;
        $obj['region_information'] = $regionInformation;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   id?: string|null,
     *   acceptance_criteria?: AcceptanceCriteria|null,
     *   description?: string|null,
     *   example?: string|null,
     *   field_type?: string|null,
     *   label?: string|null,
     *   record_type?: string|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatory_requirements'] = $regulatoryRequirements;

        return $obj;
    }
}
