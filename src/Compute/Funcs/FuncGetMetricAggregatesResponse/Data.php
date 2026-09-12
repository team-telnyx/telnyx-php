<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetMetricAggregatesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type DataShape = array{
 *   cpuUsedCoresAvg?: float|null,
 *   cpuUsedCoresMax?: float|null,
 *   endTime?: \DateTimeInterface|null,
 *   functionID?: string|null,
 *   functionName?: string|null,
 *   memoryUsedBytesAvg?: float|null,
 *   memoryUsedBytesMax?: float|null,
 *   product?: string|null,
 *   recordType?: string|null,
 *   requestClientErrorRate?: float|null,
 *   requestCount?: float|null,
 *   requestErrorRate?: float|null,
 *   requestLatencyAvgMs?: float|null,
 *   requestLatencyP50Ms?: float|null,
 *   requestLatencyP95Ms?: float|null,
 *   requestLatencyP99Ms?: float|null,
 *   requestSuccessRate?: float|null,
 *   startTime?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('cpu_used_cores_avg', nullable: true)]
    public ?float $cpuUsedCoresAvg;

    #[Optional('cpu_used_cores_max', nullable: true)]
    public ?float $cpuUsedCoresMax;

    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    #[Optional('function_id')]
    public ?string $functionID;

    #[Optional('function_name')]
    public ?string $functionName;

    #[Optional('memory_used_bytes_avg', nullable: true)]
    public ?float $memoryUsedBytesAvg;

    #[Optional('memory_used_bytes_max', nullable: true)]
    public ?float $memoryUsedBytesMax;

    #[Optional]
    public ?string $product;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('request_client_error_rate', nullable: true)]
    public ?float $requestClientErrorRate;

    #[Optional('request_count', nullable: true)]
    public ?float $requestCount;

    #[Optional('request_error_rate', nullable: true)]
    public ?float $requestErrorRate;

    #[Optional('request_latency_avg_ms', nullable: true)]
    public ?float $requestLatencyAvgMs;

    #[Optional('request_latency_p50_ms', nullable: true)]
    public ?float $requestLatencyP50Ms;

    #[Optional('request_latency_p95_ms', nullable: true)]
    public ?float $requestLatencyP95Ms;

    #[Optional('request_latency_p99_ms', nullable: true)]
    public ?float $requestLatencyP99Ms;

    #[Optional('request_success_rate', nullable: true)]
    public ?float $requestSuccessRate;

    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        float|Omitted|null $cpuUsedCoresAvg = Omitted::VALUE,
        float|Omitted|null $cpuUsedCoresMax = Omitted::VALUE,
        float|Omitted|null $memoryUsedBytesAvg = Omitted::VALUE,
        float|Omitted|null $memoryUsedBytesMax = Omitted::VALUE,
        float|Omitted|null $requestClientErrorRate = Omitted::VALUE,
        float|Omitted|null $requestCount = Omitted::VALUE,
        float|Omitted|null $requestErrorRate = Omitted::VALUE,
        float|Omitted|null $requestLatencyAvgMs = Omitted::VALUE,
        float|Omitted|null $requestLatencyP50Ms = Omitted::VALUE,
        float|Omitted|null $requestLatencyP95Ms = Omitted::VALUE,
        float|Omitted|null $requestLatencyP99Ms = Omitted::VALUE,
        float|Omitted|null $requestSuccessRate = Omitted::VALUE,
        ?\DateTimeInterface $endTime = null,
        ?string $functionID = null,
        ?string $functionName = null,
        ?string $product = null,
        ?string $recordType = null,
        ?\DateTimeInterface $startTime = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $cpuUsedCoresAvg && $self['cpuUsedCoresAvg'] = $cpuUsedCoresAvg;
        Omitted::VALUE !== $cpuUsedCoresMax && $self['cpuUsedCoresMax'] = $cpuUsedCoresMax;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $functionID && $self['functionID'] = $functionID;
        null !== $functionName && $self['functionName'] = $functionName;
        Omitted::VALUE !== $memoryUsedBytesAvg && $self['memoryUsedBytesAvg'] = $memoryUsedBytesAvg;
        Omitted::VALUE !== $memoryUsedBytesMax && $self['memoryUsedBytesMax'] = $memoryUsedBytesMax;
        null !== $product && $self['product'] = $product;
        null !== $recordType && $self['recordType'] = $recordType;
        Omitted::VALUE !== $requestClientErrorRate && $self['requestClientErrorRate'] = $requestClientErrorRate;
        Omitted::VALUE !== $requestCount && $self['requestCount'] = $requestCount;
        Omitted::VALUE !== $requestErrorRate && $self['requestErrorRate'] = $requestErrorRate;
        Omitted::VALUE !== $requestLatencyAvgMs && $self['requestLatencyAvgMs'] = $requestLatencyAvgMs;
        Omitted::VALUE !== $requestLatencyP50Ms && $self['requestLatencyP50Ms'] = $requestLatencyP50Ms;
        Omitted::VALUE !== $requestLatencyP95Ms && $self['requestLatencyP95Ms'] = $requestLatencyP95Ms;
        Omitted::VALUE !== $requestLatencyP99Ms && $self['requestLatencyP99Ms'] = $requestLatencyP99Ms;
        Omitted::VALUE !== $requestSuccessRate && $self['requestSuccessRate'] = $requestSuccessRate;
        null !== $startTime && $self['startTime'] = $startTime;

        return $self;
    }

    public function withCPUUsedCoresAvg(?float $cpuUsedCoresAvg): self
    {
        $self = clone $this;
        $self['cpuUsedCoresAvg'] = $cpuUsedCoresAvg;

        return $self;
    }

    public function withCPUUsedCoresMax(?float $cpuUsedCoresMax): self
    {
        $self = clone $this;
        $self['cpuUsedCoresMax'] = $cpuUsedCoresMax;

        return $self;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    public function withFunctionID(string $functionID): self
    {
        $self = clone $this;
        $self['functionID'] = $functionID;

        return $self;
    }

    public function withFunctionName(string $functionName): self
    {
        $self = clone $this;
        $self['functionName'] = $functionName;

        return $self;
    }

    public function withMemoryUsedBytesAvg(?float $memoryUsedBytesAvg): self
    {
        $self = clone $this;
        $self['memoryUsedBytesAvg'] = $memoryUsedBytesAvg;

        return $self;
    }

    public function withMemoryUsedBytesMax(?float $memoryUsedBytesMax): self
    {
        $self = clone $this;
        $self['memoryUsedBytesMax'] = $memoryUsedBytesMax;

        return $self;
    }

    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRequestClientErrorRate(
        ?float $requestClientErrorRate
    ): self {
        $self = clone $this;
        $self['requestClientErrorRate'] = $requestClientErrorRate;

        return $self;
    }

    public function withRequestCount(?float $requestCount): self
    {
        $self = clone $this;
        $self['requestCount'] = $requestCount;

        return $self;
    }

    public function withRequestErrorRate(?float $requestErrorRate): self
    {
        $self = clone $this;
        $self['requestErrorRate'] = $requestErrorRate;

        return $self;
    }

    public function withRequestLatencyAvgMs(?float $requestLatencyAvgMs): self
    {
        $self = clone $this;
        $self['requestLatencyAvgMs'] = $requestLatencyAvgMs;

        return $self;
    }

    public function withRequestLatencyP50Ms(?float $requestLatencyP50Ms): self
    {
        $self = clone $this;
        $self['requestLatencyP50Ms'] = $requestLatencyP50Ms;

        return $self;
    }

    public function withRequestLatencyP95Ms(?float $requestLatencyP95Ms): self
    {
        $self = clone $this;
        $self['requestLatencyP95Ms'] = $requestLatencyP95Ms;

        return $self;
    }

    public function withRequestLatencyP99Ms(?float $requestLatencyP99Ms): self
    {
        $self = clone $this;
        $self['requestLatencyP99Ms'] = $requestLatencyP99Ms;

        return $self;
    }

    public function withRequestSuccessRate(?float $requestSuccessRate): self
    {
        $self = clone $this;
        $self['requestSuccessRate'] = $requestSuccessRate;

        return $self;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
