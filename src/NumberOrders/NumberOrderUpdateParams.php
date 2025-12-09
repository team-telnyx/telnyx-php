<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;

/**
 * Updates a phone number order.
 *
 * @see Telnyx\Services\NumberOrdersService::update()
 *
 * @phpstan-type NumberOrderUpdateParamsShape = array{
 *   customerReference?: string,
 *   regulatoryRequirements?: list<UpdateRegulatoryRequirement|array{
 *     fieldValue?: string|null, requirementID?: string|null
 *   }>,
 * }
 */
final class NumberOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<NumberOrderUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

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
    public static function with(
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null
    ): self {
        $obj = new self;

        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $regulatoryRequirements && $obj['regulatoryRequirements'] = $regulatoryRequirements;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * @param list<UpdateRegulatoryRequirement|array{
     *   fieldValue?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatoryRequirements'] = $regulatoryRequirements;

        return $obj;
    }
}
