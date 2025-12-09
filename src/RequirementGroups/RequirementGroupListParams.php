<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Action;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Status;

/**
 * List requirement groups.
 *
 * @see Telnyx\Services\RequirementGroupsService::list()
 *
 * @phpstan-type RequirementGroupListParamsShape = array{
 *   filter?: Filter|array{
 *     action?: value-of<Action>|null,
 *     countryCode?: string|null,
 *     customerReference?: string|null,
 *     phoneNumberType?: value-of<PhoneNumberType>|null,
 *     status?: value-of<Status>|null,
 *   },
 * }
 */
final class RequirementGroupListParams implements BaseModel
{
    /** @use SdkModel<RequirementGroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference].
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
     * @param Filter|array{
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   customerReference?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   status?: value-of<Status>|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference].
     *
     * @param Filter|array{
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   customerReference?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   status?: value-of<Status>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
