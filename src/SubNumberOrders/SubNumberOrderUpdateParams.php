<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;

/**
 * Updates a sub number order.
 *
 * @see Telnyx\Services\SubNumberOrdersService::update()
 *
 * @phpstan-type SubNumberOrderUpdateParamsShape = array{
 *   regulatoryRequirements?: list<UpdateRegulatoryRequirement|array{
 *     fieldValue?: string|null, requirementID?: string|null
 *   }>,
 * }
 */
final class SubNumberOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderUpdateParamsShape> */
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
     * @param list<UpdateRegulatoryRequirement|array{
     *   fieldValue?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
     */
    public static function with(?array $regulatoryRequirements = null): self
    {
        $self = new self;

        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    /**
     * @param list<UpdateRegulatoryRequirement|array{
     *   fieldValue?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }
}
