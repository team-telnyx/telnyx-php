<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency;

use Telnyx\Core\Attributes\Api;
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
 *   filter?: Filter|array{global_ip_id?: string|null|In}
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
     * @param Filter|array{global_ip_id?: string|In|null} $filter
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
     * @param Filter|array{global_ip_id?: string|In|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
