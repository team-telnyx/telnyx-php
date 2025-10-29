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
 * @see Telnyx\NumberOrderPhoneNumbers->updateRequirements
 *
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementsParamsShape = array{
 *   regulatoryRequirements?: list<UpdateRegulatoryRequirement>
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementsParams implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<UpdateRegulatoryRequirement>|null $regulatoryRequirements */
    #[Api(
        'regulatory_requirements',
        list: UpdateRegulatoryRequirement::class,
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
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     */
    public static function with(?array $regulatoryRequirements = null): self
    {
        $obj = new self;

        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }

    /**
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }
}
