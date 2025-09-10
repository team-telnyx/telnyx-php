<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new GlobalIPLatencyRetrieveParams); // set properties as needed
 * $client->globalIPLatency->retrieve(...$params->toArray());
 * ```
 * Global IP Latency Metrics.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->globalIPLatency->retrieve(...$params->toArray());`
 *
 * @see Telnyx\GlobalIPLatency->retrieve
 *
 * @phpstan-type global_ip_latency_retrieve_params = array{filter?: Filter}
 */
final class GlobalIPLatencyRetrieveParams implements BaseModel
{
    /** @use SdkModel<global_ip_latency_retrieve_params> */
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
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
