<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutListRejectionCodesParams\Filter;

/**
 * Given a port-out ID, list rejection codes that are eligible for that port-out.
 *
 * @see Telnyx\Services\PortoutsService::listRejectionCodes()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter
 *
 * @phpstan-type PortoutListRejectionCodesParamsShape = array{
 *   filter?: FilterShape|null
 * }
 */
final class PortoutListRejectionCodesParams implements BaseModel
{
    /** @use SdkModel<PortoutListRejectionCodesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in].
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
     * @param FilterShape $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
