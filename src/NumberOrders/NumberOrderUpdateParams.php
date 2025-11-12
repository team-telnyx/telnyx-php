<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Api;
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
 *   customer_reference?: string,
 *   regulatory_requirements?: list<UpdateRegulatoryRequirement>,
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
    #[Api(optional: true)]
    public ?string $customer_reference;

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
    public static function with(
        ?string $customer_reference = null,
        ?array $regulatory_requirements = null
    ): self {
        $obj = new self;

        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $regulatory_requirements && $obj->regulatory_requirements = $regulatory_requirements;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

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
