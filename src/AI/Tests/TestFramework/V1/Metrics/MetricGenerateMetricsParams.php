<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Starts background generation of suggested metrics for a test agent. Returns a progress ID to poll with the get-test-metric-generation-progress endpoint.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\MetricsService::generateMetrics()
 *
 * @phpstan-type MetricGenerateMetricsParamsShape = array{
 *   agentID: int, numMetrics: int, scenarios?: list<int>|null
 * }
 */
final class MetricGenerateMetricsParams implements BaseModel
{
    /** @use SdkModel<MetricGenerateMetricsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Test agent to suggest metrics for.
     */
    #[Required('agent_id')]
    public int $agentID;

    /**
     * How many metrics to suggest.
     */
    #[Required('num_metrics')]
    public int $numMetrics;

    /**
     * Scenario IDs to base the suggestions on.
     *
     * @var list<int>|null $scenarios
     */
    #[Optional(list: 'int')]
    public ?array $scenarios;

    /**
     * `new MetricGenerateMetricsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetricGenerateMetricsParams::with(agentID: ..., numMetrics: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetricGenerateMetricsParams)->withAgentID(...)->withNumMetrics(...)
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
     * @param list<int>|null $scenarios
     */
    public static function with(
        int $agentID,
        int $numMetrics,
        ?array $scenarios = null
    ): self {
        $self = new self;

        $self['agentID'] = $agentID;
        $self['numMetrics'] = $numMetrics;

        null !== $scenarios && $self['scenarios'] = $scenarios;

        return $self;
    }

    /**
     * Test agent to suggest metrics for.
     */
    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * How many metrics to suggest.
     */
    public function withNumMetrics(int $numMetrics): self
    {
        $self = clone $this;
        $self['numMetrics'] = $numMetrics;

        return $self;
    }

    /**
     * Scenario IDs to base the suggestions on.
     *
     * @param list<int> $scenarios
     */
    public function withScenarios(array $scenarios): self
    {
        $self = clone $this;
        $self['scenarios'] = $scenarios;

        return $self;
    }
}
