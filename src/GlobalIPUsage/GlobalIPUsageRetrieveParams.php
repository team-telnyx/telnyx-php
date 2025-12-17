<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter;

/**
 * Global IP Usage Metrics.
 *
 * @see Telnyx\Services\GlobalIPUsageService::retrieve()
 *
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter
 *
 * @phpstan-type GlobalIPUsageRetrieveParamsShape = array{
 *   filter?: null|Filter|FilterShape
 * }
 */
final class GlobalIPUsageRetrieveParams implements BaseModel
{
    /** @use SdkModel<GlobalIPUsageRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
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
