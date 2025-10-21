<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;

/**
 * Retrieve regulatory requirements for a list of phone numbers.
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
