<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type OverallScoreVariants from \Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric\OverallScore
 * @phpstan-import-type TotalScoreVariants from \Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric\TotalScore
 * @phpstan-import-type OverallScoreShape from \Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric\OverallScore
 * @phpstan-import-type TotalScoreShape from \Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric\TotalScore
 *
 * @phpstan-type AITestMetricShape = array{
 *   id: int,
 *   evalType: string,
 *   name: string,
 *   type: string,
 *   addToNewAgents?: bool|null,
 *   agent?: int|null,
 *   agentNames?: list<string>|null,
 *   agents?: list<int>|null,
 *   alertFilters?: array<string,mixed>|null,
 *   alertType?: string|null,
 *   audioEnabled?: bool|null,
 *   configuration?: array<string,mixed>|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   enumValues?: list<string>|null,
 *   evaluationTrigger?: string|null,
 *   evaluationTriggerCustomCode?: string|null,
 *   evaluationTriggerPrompt?: string|null,
 *   ewmaAlpha?: float|null,
 *   functionName?: string|null,
 *   kbFileIDs?: list<int>|null,
 *   knowledgeBaseFiles?: list<string>|null,
 *   metricCost?: float|null,
 *   observabilityEnabled?: bool|null,
 *   overallScore?: OverallScoreShape|null,
 *   priorityAssignmentPrompt?: string|null,
 *   project?: int|null,
 *   prompt?: string|null,
 *   sampleRate?: float|null,
 *   samplingEnabled?: bool|null,
 *   significantChangeAlertDirection?: string|null,
 *   significantChangeAlertStatus?: string|null,
 *   simulationEnabled?: bool|null,
 *   slug?: string|null,
 *   stdMultiplier?: float|null,
 *   totalScore?: TotalScoreShape|null,
 *   triggerType?: string|null,
 *   userDefined?: bool|null,
 *   usesLlmJudge?: bool|null,
 *   windowSize?: int|null,
 * }
 */
final class AITestMetric implements BaseModel
{
    /** @use SdkModel<AITestMetricShape> */
    use SdkModel;

    #[Required]
    public int $id;

    /**
     * What the metric scores: numeric, continuous_qualitative, or binary_workflow_adherence.
     */
    #[Required('eval_type')]
    public string $evalType;

    #[Required]
    public string $name;

    /**
     * How the metric is evaluated: custom_code or llm_judge.
     */
    #[Required]
    public string $type;

    /**
     * Whether the metric is attached to newly created test agents by default.
     */
    #[Optional('add_to_new_agents', nullable: true)]
    public ?bool $addToNewAgents;

    #[Optional(nullable: true)]
    public ?int $agent;

    /** @var list<string>|null $agentNames */
    #[Optional('agent_names', list: 'string')]
    public ?array $agentNames;

    /**
     * Test agent IDs the metric is attached to.
     *
     * @var list<int>|null $agents
     */
    #[Optional(list: 'int')]
    public ?array $agents;

    /** @var array<string,mixed>|null $alertFilters */
    #[Optional('alert_filters', map: 'mixed', nullable: true)]
    public ?array $alertFilters;

    #[Optional('alert_type')]
    public ?string $alertType;

    #[Optional('audio_enabled')]
    public ?bool $audioEnabled;

    /** @var array<string,mixed>|null $configuration */
    #[Optional(map: 'mixed', nullable: true)]
    public ?array $configuration;

    #[Optional]
    public ?string $description;

    #[Optional('display_order')]
    public ?int $displayOrder;

    /**
     * Allowed values for qualitative enum metrics.
     *
     * @var list<string>|null $enumValues
     */
    #[Optional('enum_values', list: 'string')]
    public ?array $enumValues;

    #[Optional('evaluation_trigger')]
    public ?string $evaluationTrigger;

    #[Optional('evaluation_trigger_custom_code')]
    public ?string $evaluationTriggerCustomCode;

    #[Optional('evaluation_trigger_prompt')]
    public ?string $evaluationTriggerPrompt;

    /**
     * Smoothing factor for the alert trend.
     */
    #[Optional('ewma_alpha')]
    public ?float $ewmaAlpha;

    /**
     * Built-in evaluation function used by custom_code metrics.
     */
    #[Optional('function_name', nullable: true)]
    public ?string $functionName;

    /** @var list<int>|null $kbFileIDs */
    #[Optional('kb_file_ids', list: 'int')]
    public ?array $kbFileIDs;

    /** @var list<string>|null $knowledgeBaseFiles */
    #[Optional('knowledge_base_files', list: 'string')]
    public ?array $knowledgeBaseFiles;

    #[Optional('metric_cost')]
    public ?float $metricCost;

    #[Optional('observability_enabled')]
    public ?bool $observabilityEnabled;

    /** @var OverallScoreVariants|null $overallScore */
    #[Optional('overall_score')]
    public float|string|null $overallScore;

    #[Optional('priority_assignment_prompt')]
    public ?string $priorityAssignmentPrompt;

    #[Optional(nullable: true)]
    public ?int $project;

    /**
     * Judge prompt used by llm_judge metrics.
     */
    #[Optional]
    public ?string $prompt;

    #[Optional('sample_rate', nullable: true)]
    public ?float $sampleRate;

    #[Optional('sampling_enabled')]
    public ?bool $samplingEnabled;

    #[Optional('significant_change_alert_direction')]
    public ?string $significantChangeAlertDirection;

    #[Optional('significant_change_alert_status')]
    public ?string $significantChangeAlertStatus;

    #[Optional('simulation_enabled')]
    public ?bool $simulationEnabled;

    /**
     * Stable identifier of a built-in metric.
     */
    #[Optional(nullable: true)]
    public ?string $slug;

    /**
     * Standard-deviation multiplier for significant-change alerts.
     */
    #[Optional('std_multiplier')]
    public ?float $stdMultiplier;

    /** @var TotalScoreVariants|null $totalScore */
    #[Optional('total_score')]
    public float|string|null $totalScore;

    #[Optional('trigger_type')]
    public ?string $triggerType;

    #[Optional('user_defined')]
    public ?bool $userDefined;

    #[Optional('uses_llm_judge')]
    public ?bool $usesLlmJudge;

    /**
     * Sliding window size the alert status is computed over.
     */
    #[Optional('window_size')]
    public ?int $windowSize;

    /**
     * `new AITestMetric()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AITestMetric::with(id: ..., evalType: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AITestMetric)->withID(...)->withEvalType(...)->withName(...)->withType(...)
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
     * @param Omitted|array<string,mixed>|null $alertFilters
     * @param Omitted|array<string,mixed>|null $configuration
     * @param list<string>|null $agentNames
     * @param list<int>|null $agents
     * @param list<string>|null $enumValues
     * @param list<int>|null $kbFileIDs
     * @param list<string>|null $knowledgeBaseFiles
     * @param OverallScoreShape|null $overallScore
     * @param TotalScoreShape|null $totalScore
     */
    public static function with(
        int $id,
        string $evalType,
        string $name,
        string $type,
        bool|Omitted|null $addToNewAgents = Omitted::VALUE,
        int|Omitted|null $agent = Omitted::VALUE,
        Omitted|array|null $alertFilters = Omitted::VALUE,
        Omitted|array|null $configuration = Omitted::VALUE,
        string|Omitted|null $functionName = Omitted::VALUE,
        int|Omitted|null $project = Omitted::VALUE,
        float|Omitted|null $sampleRate = Omitted::VALUE,
        string|Omitted|null $slug = Omitted::VALUE,
        ?array $agentNames = null,
        ?array $agents = null,
        ?string $alertType = null,
        ?bool $audioEnabled = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?array $enumValues = null,
        ?string $evaluationTrigger = null,
        ?string $evaluationTriggerCustomCode = null,
        ?string $evaluationTriggerPrompt = null,
        ?float $ewmaAlpha = null,
        ?array $kbFileIDs = null,
        ?array $knowledgeBaseFiles = null,
        ?float $metricCost = null,
        ?bool $observabilityEnabled = null,
        float|string|null $overallScore = null,
        ?string $priorityAssignmentPrompt = null,
        ?string $prompt = null,
        ?bool $samplingEnabled = null,
        ?string $significantChangeAlertDirection = null,
        ?string $significantChangeAlertStatus = null,
        ?bool $simulationEnabled = null,
        ?float $stdMultiplier = null,
        float|string|null $totalScore = null,
        ?string $triggerType = null,
        ?bool $userDefined = null,
        ?bool $usesLlmJudge = null,
        ?int $windowSize = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['evalType'] = $evalType;
        $self['name'] = $name;
        $self['type'] = $type;

        Omitted::VALUE !== $addToNewAgents && $self['addToNewAgents'] = $addToNewAgents;
        Omitted::VALUE !== $agent && $self['agent'] = $agent;
        null !== $agentNames && $self['agentNames'] = $agentNames;
        null !== $agents && $self['agents'] = $agents;
        Omitted::VALUE !== $alertFilters && $self['alertFilters'] = $alertFilters;
        null !== $alertType && $self['alertType'] = $alertType;
        null !== $audioEnabled && $self['audioEnabled'] = $audioEnabled;
        Omitted::VALUE !== $configuration && $self['configuration'] = $configuration;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $enumValues && $self['enumValues'] = $enumValues;
        null !== $evaluationTrigger && $self['evaluationTrigger'] = $evaluationTrigger;
        null !== $evaluationTriggerCustomCode && $self['evaluationTriggerCustomCode'] = $evaluationTriggerCustomCode;
        null !== $evaluationTriggerPrompt && $self['evaluationTriggerPrompt'] = $evaluationTriggerPrompt;
        null !== $ewmaAlpha && $self['ewmaAlpha'] = $ewmaAlpha;
        Omitted::VALUE !== $functionName && $self['functionName'] = $functionName;
        null !== $kbFileIDs && $self['kbFileIDs'] = $kbFileIDs;
        null !== $knowledgeBaseFiles && $self['knowledgeBaseFiles'] = $knowledgeBaseFiles;
        null !== $metricCost && $self['metricCost'] = $metricCost;
        null !== $observabilityEnabled && $self['observabilityEnabled'] = $observabilityEnabled;
        null !== $overallScore && $self['overallScore'] = $overallScore;
        null !== $priorityAssignmentPrompt && $self['priorityAssignmentPrompt'] = $priorityAssignmentPrompt;
        Omitted::VALUE !== $project && $self['project'] = $project;
        null !== $prompt && $self['prompt'] = $prompt;
        Omitted::VALUE !== $sampleRate && $self['sampleRate'] = $sampleRate;
        null !== $samplingEnabled && $self['samplingEnabled'] = $samplingEnabled;
        null !== $significantChangeAlertDirection && $self['significantChangeAlertDirection'] = $significantChangeAlertDirection;
        null !== $significantChangeAlertStatus && $self['significantChangeAlertStatus'] = $significantChangeAlertStatus;
        null !== $simulationEnabled && $self['simulationEnabled'] = $simulationEnabled;
        Omitted::VALUE !== $slug && $self['slug'] = $slug;
        null !== $stdMultiplier && $self['stdMultiplier'] = $stdMultiplier;
        null !== $totalScore && $self['totalScore'] = $totalScore;
        null !== $triggerType && $self['triggerType'] = $triggerType;
        null !== $userDefined && $self['userDefined'] = $userDefined;
        null !== $usesLlmJudge && $self['usesLlmJudge'] = $usesLlmJudge;
        null !== $windowSize && $self['windowSize'] = $windowSize;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    /**
     * How the metric is evaluated: custom_code or llm_judge.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Whether the metric is attached to newly created test agents by default.
     */
    public function withAddToNewAgents(?bool $addToNewAgents): self
    {
        $self = clone $this;
        $self['addToNewAgents'] = $addToNewAgents;

        return $self;
    }

    public function withAgent(?int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    /**
     * @param list<string> $agentNames
     */
    public function withAgentNames(array $agentNames): self
    {
        $self = clone $this;
        $self['agentNames'] = $agentNames;

        return $self;
    }

    /**
     * Test agent IDs the metric is attached to.
     *
     * @param list<int> $agents
     */
    public function withAgents(array $agents): self
    {
        $self = clone $this;
        $self['agents'] = $agents;

        return $self;
    }

    /**
     * @param array<string,mixed>|null $alertFilters
     */
    public function withAlertFilters(?array $alertFilters): self
    {
        $self = clone $this;
        $self['alertFilters'] = $alertFilters;

        return $self;
    }

    public function withAlertType(string $alertType): self
    {
        $self = clone $this;
        $self['alertType'] = $alertType;

        return $self;
    }

    public function withAudioEnabled(bool $audioEnabled): self
    {
        $self = clone $this;
        $self['audioEnabled'] = $audioEnabled;

        return $self;
    }

    /**
     * @param array<string,mixed>|null $configuration
     */
    public function withConfiguration(?array $configuration): self
    {
        $self = clone $this;
        $self['configuration'] = $configuration;

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
     * Allowed values for qualitative enum metrics.
     *
     * @param list<string> $enumValues
     */
    public function withEnumValues(array $enumValues): self
    {
        $self = clone $this;
        $self['enumValues'] = $enumValues;

        return $self;
    }

    public function withEvaluationTrigger(string $evaluationTrigger): self
    {
        $self = clone $this;
        $self['evaluationTrigger'] = $evaluationTrigger;

        return $self;
    }

    public function withEvaluationTriggerCustomCode(
        string $evaluationTriggerCustomCode
    ): self {
        $self = clone $this;
        $self['evaluationTriggerCustomCode'] = $evaluationTriggerCustomCode;

        return $self;
    }

    public function withEvaluationTriggerPrompt(
        string $evaluationTriggerPrompt
    ): self {
        $self = clone $this;
        $self['evaluationTriggerPrompt'] = $evaluationTriggerPrompt;

        return $self;
    }

    /**
     * Smoothing factor for the alert trend.
     */
    public function withEwmaAlpha(float $ewmaAlpha): self
    {
        $self = clone $this;
        $self['ewmaAlpha'] = $ewmaAlpha;

        return $self;
    }

    /**
     * Built-in evaluation function used by custom_code metrics.
     */
    public function withFunctionName(?string $functionName): self
    {
        $self = clone $this;
        $self['functionName'] = $functionName;

        return $self;
    }

    /**
     * @param list<int> $kbFileIDs
     */
    public function withKBFileIDs(array $kbFileIDs): self
    {
        $self = clone $this;
        $self['kbFileIDs'] = $kbFileIDs;

        return $self;
    }

    /**
     * @param list<string> $knowledgeBaseFiles
     */
    public function withKnowledgeBaseFiles(array $knowledgeBaseFiles): self
    {
        $self = clone $this;
        $self['knowledgeBaseFiles'] = $knowledgeBaseFiles;

        return $self;
    }

    public function withMetricCost(float $metricCost): self
    {
        $self = clone $this;
        $self['metricCost'] = $metricCost;

        return $self;
    }

    public function withObservabilityEnabled(bool $observabilityEnabled): self
    {
        $self = clone $this;
        $self['observabilityEnabled'] = $observabilityEnabled;

        return $self;
    }

    /**
     * @param OverallScoreShape $overallScore
     */
    public function withOverallScore(float|string $overallScore): self
    {
        $self = clone $this;
        $self['overallScore'] = $overallScore;

        return $self;
    }

    public function withPriorityAssignmentPrompt(
        string $priorityAssignmentPrompt
    ): self {
        $self = clone $this;
        $self['priorityAssignmentPrompt'] = $priorityAssignmentPrompt;

        return $self;
    }

    public function withProject(?int $project): self
    {
        $self = clone $this;
        $self['project'] = $project;

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

    public function withSampleRate(?float $sampleRate): self
    {
        $self = clone $this;
        $self['sampleRate'] = $sampleRate;

        return $self;
    }

    public function withSamplingEnabled(bool $samplingEnabled): self
    {
        $self = clone $this;
        $self['samplingEnabled'] = $samplingEnabled;

        return $self;
    }

    public function withSignificantChangeAlertDirection(
        string $significantChangeAlertDirection
    ): self {
        $self = clone $this;
        $self['significantChangeAlertDirection'] = $significantChangeAlertDirection;

        return $self;
    }

    public function withSignificantChangeAlertStatus(
        string $significantChangeAlertStatus
    ): self {
        $self = clone $this;
        $self['significantChangeAlertStatus'] = $significantChangeAlertStatus;

        return $self;
    }

    public function withSimulationEnabled(bool $simulationEnabled): self
    {
        $self = clone $this;
        $self['simulationEnabled'] = $simulationEnabled;

        return $self;
    }

    /**
     * Stable identifier of a built-in metric.
     */
    public function withSlug(?string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * Standard-deviation multiplier for significant-change alerts.
     */
    public function withStdMultiplier(float $stdMultiplier): self
    {
        $self = clone $this;
        $self['stdMultiplier'] = $stdMultiplier;

        return $self;
    }

    /**
     * @param TotalScoreShape $totalScore
     */
    public function withTotalScore(float|string $totalScore): self
    {
        $self = clone $this;
        $self['totalScore'] = $totalScore;

        return $self;
    }

    public function withTriggerType(string $triggerType): self
    {
        $self = clone $this;
        $self['triggerType'] = $triggerType;

        return $self;
    }

    public function withUserDefined(bool $userDefined): self
    {
        $self = clone $this;
        $self['userDefined'] = $userDefined;

        return $self;
    }

    public function withUsesLlmJudge(bool $usesLlmJudge): self
    {
        $self = clone $this;
        $self['usesLlmJudge'] = $usesLlmJudge;

        return $self;
    }

    /**
     * Sliding window size the alert status is computed over.
     */
    public function withWindowSize(int $windowSize): self
    {
        $self = clone $this;
        $self['windowSize'] = $windowSize;

        return $self;
    }
}
