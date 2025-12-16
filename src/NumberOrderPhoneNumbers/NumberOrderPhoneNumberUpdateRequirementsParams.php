<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates requirements for a single phone number within a number order.
 *
 * @see Telnyx\Services\NumberOrderPhoneNumbersService::updateRequirements()
 *
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 *
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementsParamsShape = array{
 *   regulatoryRequirements?: list<UpdateRegulatoryRequirementShape>|null
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementsParams implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<UpdateRegulatoryRequirement>|null $regulatoryRequirements */
    #[Optional(
        'regulatory_requirements',
        list: UpdateRegulatoryRequirement::class
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
     * @param list<UpdateRegulatoryRequirementShape> $regulatoryRequirements
     */
    public static function with(?array $regulatoryRequirements = null): self
    {
        $self = new self;

        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    /**
     * @param list<UpdateRegulatoryRequirementShape> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }
}
