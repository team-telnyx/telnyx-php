<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter\GlobalIPID\In;

/**
 * Global IP Usage Metrics.
 *
 * @see Telnyx\Services\GlobalIPUsageService::retrieve()
 *
 * @phpstan-type GlobalIPUsageRetrieveParamsShape = array{
 *   filter?: Filter|array{globalIPID?: string|null|In}
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
     * @param Filter|array{globalIPID?: string|In|null} $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
     *
     * @param Filter|array{globalIPID?: string|In|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
