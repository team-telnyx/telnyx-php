<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter\GlobalIPID\In;

/**
 * Global IP Latency Metrics.
 *
 * @see Telnyx\Services\GlobalIPLatencyService::retrieve()
 *
 * @phpstan-type GlobalIPLatencyRetrieveParamsShape = array{
 *   filter?: Filter|array{globalIPID?: string|null|In}
 * }
 */
final class GlobalIPLatencyRetrieveParams implements BaseModel
{
    /** @use SdkModel<GlobalIPLatencyRetrieveParamsShape> */
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
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
     *
     * @param Filter|array{globalIPID?: string|In|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
