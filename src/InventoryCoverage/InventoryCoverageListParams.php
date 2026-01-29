<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;

/**
 * Creates an inventory coverage request. If locality, npa or national_destination_code is used in groupBy, and no region or locality filters are used, the whole paginated set is returned.
 *
 * @see Telnyx\Services\InventoryCoverageService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter
 *
 * @phpstan-type InventoryCoverageListParamsShape = array{
 *   filter?: null|Filter|FilterShape
 * }
 */
final class InventoryCoverageListParams implements BaseModel
{
    /** @use SdkModel<InventoryCoverageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[npa], filter[nxx], filter[administrative_area], filter[phone_number_type], filter[country_code], filter[count], filter[features], filter[groupBy].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[npa], filter[nxx], filter[administrative_area], filter[phone_number_type], filter[country_code], filter[count], filter[features], filter[groupBy].
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
