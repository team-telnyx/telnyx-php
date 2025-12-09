<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;

/**
 * Retrieve regulatory requirements for a list of phone numbers.
 *
 * @see Telnyx\Services\PhoneNumbersRegulatoryRequirementsService::retrieve()
 *
 * @phpstan-type PhoneNumbersRegulatoryRequirementRetrieveParamsShape = array{
 *   filter?: Filter|array{phoneNumber?: string|null}
 * }
 */
final class PhoneNumbersRegulatoryRequirementRetrieveParams implements BaseModel
{
    /** @use SdkModel<PhoneNumbersRegulatoryRequirementRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{phoneNumber?: string|null} $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number].
     *
     * @param Filter|array{phoneNumber?: string|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
