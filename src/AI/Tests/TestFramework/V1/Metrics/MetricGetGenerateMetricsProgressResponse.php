<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse\Metric;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MetricShape from \Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse\Metric
 *
 * @phpstan-type MetricGetGenerateMetricsProgressResponseShape = array{
 *   agentID: int,
 *   currentStep: string,
 *   error: string|null,
 *   metrics: list<Metric|MetricShape>,
 *   status: Status|value-of<Status>,
 * }
 */
final class MetricGetGenerateMetricsProgressResponse implements BaseModel
{
    /** @use SdkModel<MetricGetGenerateMetricsProgressResponseShape> */
    use SdkModel;

    #[Required('agent_id')]
    public int $agentID;

    #[Required('current_step')]
    public string $currentStep;

    #[Required]
    public ?string $error;

    /** @var list<Metric> $metrics */
    #[Required(list: Metric::class)]
    public array $metrics;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * `new MetricGetGenerateMetricsProgressResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetricGetGenerateMetricsProgressResponse::with(
     *   agentID: ..., currentStep: ..., error: ..., metrics: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetricGetGenerateMetricsProgressResponse)
     *   ->withAgentID(...)
     *   ->withCurrentStep(...)
     *   ->withError(...)
     *   ->withMetrics(...)
     *   ->withStatus(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Metric|MetricShape> $metrics
     * @param Status|value-of<Status> $status
     */
    public static function with(
        int $agentID,
        string $currentStep,
        ?string $error,
        array $metrics,
        Status|string $status,
    ): self {
        $self = new self;

        $self['agentID'] = $agentID;
        $self['currentStep'] = $currentStep;
        $self['error'] = $error;
        $self['metrics'] = $metrics;
        $self['status'] = $status;

        return $self;
    }

    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    public function withCurrentStep(string $currentStep): self
    {
        $self = clone $this;
        $self['currentStep'] = $currentStep;

        return $self;
    }

    public function withError(?string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * @param list<Metric|MetricShape> $metrics
     */
    public function withMetrics(array $metrics): self
    {
        $self = clone $this;
        $self['metrics'] = $metrics;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
