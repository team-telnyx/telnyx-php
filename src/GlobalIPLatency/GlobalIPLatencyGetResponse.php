<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\MeanLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\ProberLocation;

/**
 * @phpstan-type GlobalIPLatencyGetResponseShape = array{data?: list<Data>|null}
 */
final class GlobalIPLatencyGetResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPLatencyGetResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     *   globalIP?: GlobalIP|null,
     *   meanLatency?: MeanLatency|null,
     *   percentileLatency?: PercentileLatency|null,
     *   proberLocation?: ProberLocation|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   globalIP?: GlobalIP|null,
     *   meanLatency?: MeanLatency|null,
     *   percentileLatency?: PercentileLatency|null,
     *   proberLocation?: ProberLocation|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
