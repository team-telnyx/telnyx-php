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
 *   regulatory_requirements?: list<UpdateRegulatoryRequirement|array{
 *     field_value?: string|null, requirement_id?: string|null
 *   }>,
 * }
 */
final class SubNumberOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<UpdateRegulatoryRequirement>|null $regulatory_requirements */
    #[Optional(list: UpdateRegulatoryRequirement::class)]
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
     * @param list<UpdateRegulatoryRequirement|array{
     *   field_value?: string|null, requirement_id?: string|null
     * }> $regulatory_requirements
     */
    public static function with(?array $regulatory_requirements = null): self
    {
        $obj = new self;

        null !== $regulatory_requirements && $obj['regulatory_requirements'] = $regulatory_requirements;

        return $obj;
    }

    /**
     * @param list<UpdateRegulatoryRequirement|array{
     *   field_value?: string|null, requirement_id?: string|null
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
