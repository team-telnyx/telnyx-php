<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RegulatoryRequirementRetrieveParams); // set properties as needed
 * $client->regulatoryRequirements->retrieve(...$params->toArray());
 * ```
 * Retrieve regulatory requirements.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->regulatoryRequirements->retrieve(...$params->toArray());`
 *
 * @see Telnyx\RegulatoryRequirements->retrieve
 *
 * @phpstan-type regulatory_requirement_retrieve_params = array{filter?: Filter}
 */
final class RegulatoryRequirementRetrieveParams implements BaseModel
{
    /** @use SdkModel<regulatory_requirement_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
