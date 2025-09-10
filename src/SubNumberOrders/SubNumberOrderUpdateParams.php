<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SubNumberOrderUpdateParams); // set properties as needed
 * $client->subNumberOrders->update(...$params->toArray());
 * ```
 * Updates a sub number order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->subNumberOrders->update(...$params->toArray());`
 *
 * @see Telnyx\SubNumberOrders->update
 *
 * @phpstan-type sub_number_order_update_params = array{
 *   regulatoryRequirements?: list<UpdateRegulatoryRequirement>
 * }
 */
final class SubNumberOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<sub_number_order_update_params> */
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
