<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\CountryCode;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\Feature;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\GroupBy;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\PhoneNumberType;

/**
 * Creates an inventory coverage request. If locality, npa or national_destination_code is used in groupBy, and no region or locality filters are used, the whole paginated set is returned.
 *
 * @see Telnyx\Services\InventoryCoverageService::list()
 *
 * @phpstan-type InventoryCoverageListParamsShape = array{
 *   filter?: Filter|array{
 *     administrative_area?: string|null,
 *     count?: bool|null,
 *     country_code?: value-of<CountryCode>|null,
 *     features?: list<value-of<Feature>>|null,
 *     groupBy?: value-of<GroupBy>|null,
 *     npa?: int|null,
 *     nxx?: int|null,
 *     phone_number_type?: value-of<PhoneNumberType>|null,
 *   },
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
     * @param Filter|array{
     *   administrative_area?: string|null,
     *   count?: bool|null,
     *   country_code?: value-of<CountryCode>|null,
     *   features?: list<value-of<Feature>>|null,
     *   groupBy?: value-of<GroupBy>|null,
     *   npa?: int|null,
     *   nxx?: int|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[npa], filter[nxx], filter[administrative_area], filter[phone_number_type], filter[country_code], filter[count], filter[features], filter[groupBy].
     *
     * @param Filter|array{
     *   administrative_area?: string|null,
     *   count?: bool|null,
     *   country_code?: value-of<CountryCode>|null,
     *   features?: list<value-of<Feature>>|null,
     *   groupBy?: value-of<GroupBy>|null,
     *   npa?: int|null,
     *   nxx?: int|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
