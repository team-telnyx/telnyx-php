<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber\RegulatoryRequirement;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   id?: string|null,
 *   bundle_id?: string|null,
 *   country_code?: string|null,
 *   phone_number?: string|null,
 *   phone_number_type?: string|null,
 *   record_type?: string|null,
 *   regulatory_requirements?: list<\Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber\RegulatoryRequirement>|null,
 *   requirements_met?: bool|null,
 *   requirements_status?: string|null,
 *   status?: string|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $bundle_id;

    #[Api(optional: true)]
    public ?string $country_code;

    #[Api(optional: true)]
    public ?string $phone_number;

    #[Api(optional: true)]
    public ?string $phone_number_type;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * @var list<RegulatoryRequirement>|null $regulatory_requirements
     */
    #[Api(
        list: RegulatoryRequirement::class,
        optional: true,
    )]
    public ?array $regulatory_requirements;

    #[Api(optional: true)]
    public ?bool $requirements_met;

    #[Api(optional: true)]
    public ?string $requirements_status;

    #[Api(optional: true)]
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
     * @param list<RegulatoryRequirement> $regulatory_requirements
     */
    public static function with(
        ?string $id = null,
        ?string $bundle_id = null,
        ?string $country_code = null,
        ?string $phone_number = null,
        ?string $phone_number_type = null,
        ?string $record_type = null,
        ?array $regulatory_requirements = null,
        ?bool $requirements_met = null,
        ?string $requirements_status = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $bundle_id && $obj->bundle_id = $bundle_id;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $phone_number_type && $obj->phone_number_type = $phone_number_type;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $regulatory_requirements && $obj->regulatory_requirements = $regulatory_requirements;
        null !== $requirements_met && $obj->requirements_met = $requirements_met;
        null !== $requirements_status && $obj->requirements_status = $requirements_status;
        null !== $status && $obj->status = $status;

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
        $obj->bundle_id = $bundleID;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj->phone_number_type = $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatory_requirements = $regulatoryRequirements;

        return $obj;
    }

    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj->requirements_met = $requirementsMet;

        return $obj;
    }

    public function withRequirementsStatus(string $requirementsStatus): self
    {
        $obj = clone $this;
        $obj->requirements_status = $requirementsStatus;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
