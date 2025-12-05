<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\Action;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\PhoneNumberType;

/**
 * Retrieve regulatory requirements.
 *
 * @see Telnyx\Services\RegulatoryRequirementsService::retrieve()
 *
 * @phpstan-type RegulatoryRequirementRetrieveParamsShape = array{
 *   filter?: Filter|array{
 *     action?: value-of<Action>|null,
 *     country_code?: string|null,
 *     phone_number?: string|null,
 *     phone_number_type?: value-of<PhoneNumberType>|null,
 *     requirement_group_id?: string|null,
 *   },
 * }
 */
final class RegulatoryRequirementRetrieveParams implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementRetrieveParamsShape> */
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
     *
     * @param Filter|array{
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   requirement_group_id?: string|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action].
     *
     * @param Filter|array{
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   requirement_group_id?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
