<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type data_alias = array{
 *   action?: string|null,
 *   countryCode?: string|null,
 *   phoneNumberType?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $action;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    #[Api('phone_number_type', optional: true)]
    public ?string $phoneNumberType;

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
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public static function with(
        ?string $action = null,
        ?string $countryCode = null,
        ?string $phoneNumberType = null,
        ?array $regulatoryRequirements = null,
    ): self {
        $obj = new self;

        null !== $action && $obj->action = $action;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType;
        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }

    public function withAction(string $action): self
    {
        $obj = clone $this;
        $obj->action = $action;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj->phoneNumberType = $phoneNumberType;

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
