<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates requirements for a single phone number within a number order.
 *
 * @see Telnyx\NumberOrderPhoneNumbersService::updateRequirements()
 *
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementsParamsShape = array{
 *   regulatory_requirements?: list<UpdateRegulatoryRequirement>
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementsParams implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<UpdateRegulatoryRequirement>|null $regulatory_requirements */
    #[Api(list: UpdateRegulatoryRequirement::class, optional: true)]
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
     * @param list<UpdateRegulatoryRequirement> $regulatory_requirements
     */
    public static function with(?array $regulatory_requirements = null): self
    {
        $obj = new self;

        null !== $regulatory_requirements && $obj->regulatory_requirements = $regulatory_requirements;

        return $obj;
    }

    /**
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatory_requirements = $regulatoryRequirements;

        return $obj;
    }
}
