<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Context;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Scenarios;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Omitted;

/**
 * Starts an interactive session that improves selected evaluator scenarios from a natural-language instruction. Returns a progress ID to poll with the improve-scenarios-progress endpoint.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::scenarioAgent()
 *
 * @phpstan-import-type ScenariosVariants from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Scenarios
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Scenarios
 * @phpstan-import-type ContextShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Context
 *
 * @phpstan-type ScenarioScenarioAgentParamsShape = array{
 *   scenarios: ScenariosShape,
 *   userMessage: string,
 *   agentID?: int|null,
 *   agentResolutionResponse?: string|null,
 *   applyChanges?: bool|null,
 *   context?: list<Context|ContextShape>|null,
 *   knowledgeBase?: list<int>|null,
 *   numScenarios?: int|null,
 *   pendingToolCalls?: list<array<string,mixed>>|null,
 *   scenariosNeedingAgent?: list<int>|null,
 *   sessionID?: int|null,
 *   updatedScenarios?: list<array<string,mixed>>|null,
 * }
 */
final class ScenarioScenarioAgentParams implements BaseModel
{
    /** @use SdkModel<ScenarioScenarioAgentParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Scenario IDs to improve, or the literal string 'all'.
     *
     * @var ScenariosVariants $scenarios
     */
    #[Required(union: Scenarios::class)]
    public string|array $scenarios;

    /**
     * What the assistant should improve about the selected scenarios.
     */
    #[Required('user_message')]
    public string $userMessage;

    #[Optional('agent_id', nullable: true)]
    public ?int $agentID;

    #[Optional('agent_resolution_response')]
    public ?string $agentResolutionResponse;

    #[Optional('apply_changes')]
    public ?bool $applyChanges;

    /** @var list<Context>|null $context */
    #[Optional(list: Context::class, nullable: true)]
    public ?array $context;

    /** @var list<int>|null $knowledgeBase */
    #[Optional('knowledge_base', list: 'int')]
    public ?array $knowledgeBase;

    #[Optional('num_scenarios')]
    public ?int $numScenarios;

    /** @var list<array<string,mixed>>|null $pendingToolCalls */
    #[Optional('pending_tool_calls', list: new MapOf('mixed'), nullable: true)]
    public ?array $pendingToolCalls;

    /** @var list<int>|null $scenariosNeedingAgent */
    #[Optional('scenarios_needing_agent', list: 'int')]
    public ?array $scenariosNeedingAgent;

    #[Optional('session_id', nullable: true)]
    public ?int $sessionID;

    /** @var list<array<string,mixed>>|null $updatedScenarios */
    #[Optional('updated_scenarios', list: new MapOf('mixed'))]
    public ?array $updatedScenarios;

    /**
     * `new ScenarioScenarioAgentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioScenarioAgentParams::with(scenarios: ..., userMessage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioScenarioAgentParams)->withScenarios(...)->withUserMessage(...)
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
     * @param ScenariosShape $scenarios
     * @param list<Context|ContextShape>|Omitted|null $context
     * @param list<array<string,mixed>>|Omitted|null $pendingToolCalls
     * @param list<int>|null $knowledgeBase
     * @param list<int>|null $scenariosNeedingAgent
     * @param list<array<string,mixed>>|null $updatedScenarios
     */
    public static function with(
        string|array $scenarios,
        string $userMessage,
        int|Omitted|null $agentID = Omitted::VALUE,
        array|Omitted|null $context = Omitted::VALUE,
        array|Omitted|null $pendingToolCalls = Omitted::VALUE,
        int|Omitted|null $sessionID = Omitted::VALUE,
        ?string $agentResolutionResponse = null,
        ?bool $applyChanges = null,
        ?array $knowledgeBase = null,
        ?int $numScenarios = null,
        ?array $scenariosNeedingAgent = null,
        ?array $updatedScenarios = null,
    ): self {
        $self = new self;

        $self['scenarios'] = $scenarios;
        $self['userMessage'] = $userMessage;

        Omitted::VALUE !== $agentID && $self['agentID'] = $agentID;
        null !== $agentResolutionResponse && $self['agentResolutionResponse'] = $agentResolutionResponse;
        null !== $applyChanges && $self['applyChanges'] = $applyChanges;
        Omitted::VALUE !== $context && $self['context'] = $context;
        null !== $knowledgeBase && $self['knowledgeBase'] = $knowledgeBase;
        null !== $numScenarios && $self['numScenarios'] = $numScenarios;
        Omitted::VALUE !== $pendingToolCalls && $self['pendingToolCalls'] = $pendingToolCalls;
        null !== $scenariosNeedingAgent && $self['scenariosNeedingAgent'] = $scenariosNeedingAgent;
        Omitted::VALUE !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $updatedScenarios && $self['updatedScenarios'] = $updatedScenarios;

        return $self;
    }

    /**
     * Scenario IDs to improve, or the literal string 'all'.
     *
     * @param ScenariosShape $scenarios
     */
    public function withScenarios(string|array $scenarios): self
    {
        $self = clone $this;
        $self['scenarios'] = $scenarios;

        return $self;
    }

    /**
     * What the assistant should improve about the selected scenarios.
     */
    public function withUserMessage(string $userMessage): self
    {
        $self = clone $this;
        $self['userMessage'] = $userMessage;

        return $self;
    }

    public function withAgentID(?int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    public function withAgentResolutionResponse(
        string $agentResolutionResponse
    ): self {
        $self = clone $this;
        $self['agentResolutionResponse'] = $agentResolutionResponse;

        return $self;
    }

    public function withApplyChanges(bool $applyChanges): self
    {
        $self = clone $this;
        $self['applyChanges'] = $applyChanges;

        return $self;
    }

    /**
     * @param list<Context|ContextShape>|null $context
     */
    public function withContext(?array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * @param list<int> $knowledgeBase
     */
    public function withKnowledgeBase(array $knowledgeBase): self
    {
        $self = clone $this;
        $self['knowledgeBase'] = $knowledgeBase;

        return $self;
    }

    public function withNumScenarios(int $numScenarios): self
    {
        $self = clone $this;
        $self['numScenarios'] = $numScenarios;

        return $self;
    }

    /**
     * @param list<array<string,mixed>>|null $pendingToolCalls
     */
    public function withPendingToolCalls(?array $pendingToolCalls): self
    {
        $self = clone $this;
        $self['pendingToolCalls'] = $pendingToolCalls;

        return $self;
    }

    /**
     * @param list<int> $scenariosNeedingAgent
     */
    public function withScenariosNeedingAgent(
        array $scenariosNeedingAgent
    ): self {
        $self = clone $this;
        $self['scenariosNeedingAgent'] = $scenariosNeedingAgent;

        return $self;
    }

    public function withSessionID(?int $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $updatedScenarios
     */
    public function withUpdatedScenarios(array $updatedScenarios): self
    {
        $self = clone $this;
        $self['updatedScenarios'] = $updatedScenarios;

        return $self;
    }
}
