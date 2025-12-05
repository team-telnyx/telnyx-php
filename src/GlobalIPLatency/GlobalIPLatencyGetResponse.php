<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\MeanLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\ProberLocation;

/**
 * @phpstan-type GlobalIPLatencyGetResponseShape = array{data?: list<Data>|null}
 */
final class GlobalIPLatencyGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<GlobalIPLatencyGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   global_ip?: GlobalIP|null,
     *   mean_latency?: MeanLatency|null,
     *   percentile_latency?: PercentileLatency|null,
     *   prober_location?: ProberLocation|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   global_ip?: GlobalIP|null,
     *   mean_latency?: MeanLatency|null,
     *   percentile_latency?: PercentileLatency|null,
     *   prober_location?: ProberLocation|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
