<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumbersRegulatoryRequirementRetrieveParams); // set properties as needed
 * $client->phoneNumbersRegulatoryRequirements->retrieve(...$params->toArray());
 * ```
 * Retrieve regulatory requirements for a list of phone numbers.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbersRegulatoryRequirements->retrieve(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbersRegulatoryRequirements->retrieve
 *
 * @phpstan-type phone_numbers_regulatory_requirement_retrieve_params = array{
 *   filter?: Filter
 * }
 */
final class PhoneNumbersRegulatoryRequirementRetrieveParams implements BaseModel
{
    /** @use SdkModel<phone_numbers_regulatory_requirement_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
