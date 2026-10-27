<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGenerateBgParams\ScenarioType;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetGenerateProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveExportScenariosParams\ExportType;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Mode;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Context;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Scenarios
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Scenarios as ScenariosShape1
 * @phpstan-import-type ContextShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Context
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ScenariosContract
{
    /**
     * @api
     *
     * @param int $personality ID of the personality the caller simulates
     * @param list<int> $metrics
     * @param list<string> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        int $personality,
        int|Omitted|null $agent = Omitted::VALUE,
        ?string $expectedOutcomePrompt = null,
        ?string $firstMessage = null,
        string|Omitted|null $folderPath = Omitted::VALUE,
        ?string $instructions = null,
        ?array $metrics = null,
        ?array $tags = null,
        ?int $testProfile = null,
        RequestOptions|array|null $requestOptions = null,
    ): EvaluatorScenarioDetail;

    /**
     * @api
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): EvaluatorScenarioDetail;

    /**
     * @api
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param list<int> $metrics
     * @param list<string> $tags
     * @param list<string> $toolIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $id,
        int|Omitted|null $agent = Omitted::VALUE,
        ?string $expectedOutcomePrompt = null,
        ?string $firstMessage = null,
        string|Omitted|null $folderPath = Omitted::VALUE,
        ?int $inboundPhoneNumber = null,
        ?string $instructions = null,
        int|Omitted|null $maxDuration = Omitted::VALUE,
        ?array $metrics = null,
        ?string $name = null,
        ?int $personality = null,
        ?int $phoneNumber = null,
        ?string $scenarioLanguage = null,
        ?array $tags = null,
        ?int $testProfile = null,
        ?array $toolIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): EvaluatorScenarioDetail;

    /**
     * @api
     *
     * @param int $agentID filter scenarios belonging to the specified test agent
     * @param string $assistantID filter scenarios belonging to the specified Telnyx assistant
     * @param int $page page number (1-based)
     * @param int $pageSize number of results per page
     * @param string $tags filter scenarios by a comma-separated list of tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $agentID = null,
        ?string $assistantID = null,
        int $page = 1,
        int $pageSize = 25,
        ?string $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScenarioListResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $numScenarios how many scenarios to generate
     * @param string $extraInstructions optional guidance steering scenario generation
     * @param bool $generateExpectedOutcomes whether to generate expected-outcome prompts for the scenarios
     * @param list<int> $personalities
     * @param ScenarioType|value-of<ScenarioType> $scenarioType type of scenario to generate
     * @param list<string> $tags
     * @param list<string> $toolIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateBg(
        int $numScenarios,
        ?int $agentID = null,
        ?string $extraInstructions = null,
        ?string $firstMessage = null,
        string|Omitted|null $folderPath = Omitted::VALUE,
        ?bool $generateExpectedOutcomes = null,
        int|Omitted|null $inboundPhoneNumber = Omitted::VALUE,
        ?array $personalities = null,
        ScenarioType|string|null $scenarioType = null,
        ?array $tags = null,
        ?int $testProfile = null,
        ?array $toolIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScenarioGenerationResponse;

    /**
     * @api
     *
     * @param ExportType|value-of<ExportType> $exportType file format of the export
     * @param string $scenarioIDs comma-separated scenario IDs to export
     * @param int $agentID export scenarios belonging to the specified test agent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveExportScenarios(
        ExportType|string $exportType,
        string $scenarioIDs,
        ?int $agentID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $progressID progress ID returned by the generate-evaluator-scenarios endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveGenerateProgress(
        string $progressID,
        RequestOptions|array|null $requestOptions = null
    ): ScenarioGetGenerateProgressResponse;

    /**
     * @api
     *
     * @param string $progressID progress ID returned by the improve-evaluator-scenarios endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveScenarioAgentProgress(
        string $progressID,
        RequestOptions|array|null $requestOptions = null
    ): ScenarioGetScenarioAgentProgressResponse;

    /**
     * @api
     *
     * @param int $concurrencyLimit maximum number of concurrent simulated calls
     * @param Mode|value-of<Mode> $mode
     * @param list<int> $personalityIDs
     * @param ScenariosShape $scenarios scenario IDs to run, or the literal string 'all'
     * @param list<string> $tags
     * @param list<int> $testProfileIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function runScenarios(
        ?int $agentID = null,
        ?string $agentNumber = null,
        ?string $assistantID = null,
        ?int $concurrencyLimit = null,
        ?int $frequency = null,
        Mode|string|null $mode = null,
        ?string $name = null,
        ?string $outboundPhoneNumber = null,
        ?array $personalityIDs = null,
        string|array|null $scenarios = null,
        ?array $tags = null,
        ?array $testProfileIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScenarioRunScenariosResponse;

    /**
     * @api
     *
     * @param ScenariosShape1 $scenarios scenario IDs to improve, or the literal string 'all'
     * @param string $userMessage what the assistant should improve about the selected scenarios
     * @param list<Context|ContextShape>|Omitted|null $context
     * @param list<int> $knowledgeBase
     * @param list<array<string,mixed>>|Omitted|null $pendingToolCalls
     * @param list<int> $scenariosNeedingAgent
     * @param list<array<string,mixed>> $updatedScenarios
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function scenarioAgent(
        string|array $scenarios,
        string $userMessage,
        int|Omitted|null $agentID = Omitted::VALUE,
        ?string $agentResolutionResponse = null,
        ?bool $applyChanges = null,
        array|Omitted|null $context = Omitted::VALUE,
        ?array $knowledgeBase = null,
        ?int $numScenarios = null,
        array|Omitted|null $pendingToolCalls = Omitted::VALUE,
        ?array $scenariosNeedingAgent = null,
        int|Omitted|null $sessionID = Omitted::VALUE,
        ?array $updatedScenarios = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScenarioScenarioAgentResponse;
}
