<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Updates the specified metric.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\MetricsService::update()
 *
 * @phpstan-type MetricUpdateParamsShape = array{
 *   addToNewAgents?: bool|null,
 *   agents?: list<int>|null,
 *   audioEnabled?: bool|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   enumValues?: list<string>|null,
 *   evalType?: string|null,
 *   name?: string|null,
 *   observabilityEnabled?: bool|null,
 *   prompt?: string|null,
 *   samplingEnabled?: bool|null,
 *   simulationEnabled?: bool|null,
 *   type?: string|null,
 * }
 */
final class MetricUpdateParams implements BaseModel
{
    /** @use SdkModel<MetricUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('add_to_new_agents', nullable: true)]
    public ?bool $addToNewAgents;

    /** @var list<int>|null $agents */
    #[Optional(list: 'int')]
    public ?array $agents;

    #[Optional('audio_enabled')]
    public ?bool $audioEnabled;

    #[Optional]
    public ?string $description;

    #[Optional('display_order')]
    public ?int $displayOrder;

    /** @var list<string>|null $enumValues */
    #[Optional('enum_values', list: 'string')]
    public ?array $enumValues;

    /**
     * What the metric scores: numeric, continuous_qualitative, or binary_workflow_adherence.
     */
    #[Optional('eval_type')]
    public ?string $evalType;

    #[Optional]
    public ?string $name;

    #[Optional('observability_enabled')]
    public ?bool $observabilityEnabled;

    /**
     * Judge prompt used by llm_judge metrics.
     */
    #[Optional]
    public ?string $prompt;

    #[Optional('sampling_enabled')]
    public ?bool $samplingEnabled;

    #[Optional('simulation_enabled')]
    public ?bool $simulationEnabled;

    /**
     * How the metric is evaluated: custom_code or llm_judge.
     */
    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $agents
     * @param list<string>|null $enumValues
     */
    public static function with(
        bool|Omitted|null $addToNewAgents = Omitted::VALUE,
        ?array $agents = null,
        ?bool $audioEnabled = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?array $enumValues = null,
        ?string $evalType = null,
        ?string $name = null,
        ?bool $observabilityEnabled = null,
        ?string $prompt = null,
        ?bool $samplingEnabled = null,
        ?bool $simulationEnabled = null,
        ?string $type = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $addToNewAgents && $self['addToNewAgents'] = $addToNewAgents;
        null !== $agents && $self['agents'] = $agents;
        null !== $audioEnabled && $self['audioEnabled'] = $audioEnabled;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $enumValues && $self['enumValues'] = $enumValues;
        null !== $evalType && $self['evalType'] = $evalType;
        null !== $name && $self['name'] = $name;
        null !== $observabilityEnabled && $self['observabilityEnabled'] = $observabilityEnabled;
        null !== $prompt && $self['prompt'] = $prompt;
        null !== $samplingEnabled && $self['samplingEnabled'] = $samplingEnabled;
        null !== $simulationEnabled && $self['simulationEnabled'] = $simulationEnabled;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withAddToNewAgents(?bool $addToNewAgents): self
    {
        $self = clone $this;
        $self['addToNewAgents'] = $addToNewAgents;

        return $self;
    }

    /**
     * @param list<int> $agents
     */
    public function withAgents(array $agents): self
    {
        $self = clone $this;
        $self['agents'] = $agents;

        return $self;
    }

    public function withAudioEnabled(bool $audioEnabled): self
    {
        $self = clone $this;
        $self['audioEnabled'] = $audioEnabled;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * @param list<string> $enumValues
     */
    public function withEnumValues(array $enumValues): self
    {
        $self = clone $this;
        $self['enumValues'] = $enumValues;

        return $self;
    }

    /**
     * What the metric scores: numeric, continuous_qualitative, or binary_workflow_adherence.
     */
    public function withEvalType(string $evalType): self
    {
        $self = clone $this;
        $self['evalType'] = $evalType;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withObservabilityEnabled(bool $observabilityEnabled): self
    {
        $self = clone $this;
        $self['observabilityEnabled'] = $observabilityEnabled;

        return $self;
    }

    /**
     * Judge prompt used by llm_judge metrics.
     */
    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }

    public function withSamplingEnabled(bool $samplingEnabled): self
    {
        $self = clone $this;
        $self['samplingEnabled'] = $samplingEnabled;

        return $self;
    }

    public function withSimulationEnabled(bool $simulationEnabled): self
    {
        $self = clone $this;
        $self['simulationEnabled'] = $simulationEnabled;

        return $self;
    }

    /**
     * How the metric is evaluated: custom_code or llm_judge.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
