<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;

/**
 * Retrieve regulatory requirements.
 *
 * @see Telnyx\Services\RegulatoryRequirementsService::retrieve()
 *
 * @phpstan-import-type FilterShape from \Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter
 *
 * @phpstan-type RegulatoryRequirementRetrieveParamsShape = array{
 *   filter?: null|Filter|FilterShape
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
     * @param Filter|FilterShape|null $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
