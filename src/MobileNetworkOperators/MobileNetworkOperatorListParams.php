<?php

declare(strict_types=1);

namespace Telnyx\MobileNetworkOperators;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Page;

/**
 * Telnyx has a set of GSM mobile operators partners that are available through our mobile network roaming. This resource is entirely managed by Telnyx and may change over time. That means that this resource won't allow any write operations for it. Still, it's available so it can be used as a support resource that can be related to other resources or become a configuration option.
 *
 * @see Telnyx\Services\MobileNetworkOperatorsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Page
 *
 * @phpstan-type MobileNetworkOperatorListParamsShape = array{
 *   filter?: FilterShape|null, page?: PageShape|null
 * }
 */
final class MobileNetworkOperatorListParams implements BaseModel
{
    /** @use SdkModel<MobileNetworkOperatorListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterShape $filter
     * @param PageShape $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
