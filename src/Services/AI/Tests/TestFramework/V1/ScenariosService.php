<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

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
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\ScenariosContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Scenarios
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Scenarios as ScenariosShape1
 * @phpstan-import-type ContextShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Context
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ScenariosService implements ScenariosContract
{
    /**
     * @api
     */
    public ScenariosRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ScenariosRawService($client);
    }

    /**
     * @api
     *
     * Creates an evaluator scenario in your organization.
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
    ): EvaluatorScenarioDetail {
        $params = array_filter(
            [
                'name' => $name,
                'personality' => $personality,
                'agent' => $agent,
                'expectedOutcomePrompt' => $expectedOutcomePrompt ?? Omitted::VALUE,
                'firstMessage' => $firstMessage ?? Omitted::VALUE,
                'folderPath' => $folderPath,
                'instructions' => $instructions ?? Omitted::VALUE,
                'metrics' => $metrics ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'testProfile' => $testProfile ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the specified evaluator scenario with full detail.
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): EvaluatorScenarioDetail {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified evaluator scenario.
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
    ): EvaluatorScenarioDetail {
        $params = array_filter(
            [
                'agent' => $agent,
                'expectedOutcomePrompt' => $expectedOutcomePrompt ?? Omitted::VALUE,
                'firstMessage' => $firstMessage ?? Omitted::VALUE,
                'folderPath' => $folderPath,
                'inboundPhoneNumber' => $inboundPhoneNumber ?? Omitted::VALUE,
                'instructions' => $instructions ?? Omitted::VALUE,
                'maxDuration' => $maxDuration,
                'metrics' => $metrics ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'personality' => $personality ?? Omitted::VALUE,
                'phoneNumber' => $phoneNumber ?? Omitted::VALUE,
                'scenarioLanguage' => $scenarioLanguage ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'testProfile' => $testProfile ?? Omitted::VALUE,
                'toolIDs' => $toolIDs ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of evaluator scenarios in your organization, optionally filtered by test agent or tags.
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
    ): ScenarioListResponse {
        $params = array_filter(
            [
                'agentID' => $agentID ?? Omitted::VALUE,
                'assistantID' => $assistantID ?? Omitted::VALUE,
                'page' => $page,
                'pageSize' => $pageSize,
                'tags' => $tags ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the specified evaluator scenario.
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts background generation of evaluator scenarios for a test agent. Returns a progress ID to poll with the generate-scenarios-progress endpoint.
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
    ): ScenarioGenerationResponse {
        $params = array_filter(
            [
                'numScenarios' => $numScenarios,
                'agentID' => $agentID ?? Omitted::VALUE,
                'extraInstructions' => $extraInstructions ?? Omitted::VALUE,
                'firstMessage' => $firstMessage ?? Omitted::VALUE,
                'folderPath' => $folderPath,
                'generateExpectedOutcomes' => $generateExpectedOutcomes ?? Omitted::VALUE,
                'inboundPhoneNumber' => $inboundPhoneNumber,
                'personalities' => $personalities ?? Omitted::VALUE,
                'scenarioType' => $scenarioType ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'testProfile' => $testProfile ?? Omitted::VALUE,
                'toolIDs' => $toolIDs ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateBg(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Exports the selected evaluator scenarios as a CSV or XLSX file download.
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
    ): string {
        $params = array_filter(
            [
                'exportType' => $exportType,
                'scenarioIDs' => $scenarioIDs,
                'agentID' => $agentID ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveExportScenarios(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of a background scenario-generation job started with the generate-evaluator-scenarios endpoint.
     *
     * @param string $progressID progress ID returned by the generate-evaluator-scenarios endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveGenerateProgress(
        string $progressID,
        RequestOptions|array|null $requestOptions = null
    ): ScenarioGetGenerateProgressResponse {
        $params = ['progressID' => $progressID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveGenerateProgress(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of an improve-scenarios session started with the improve-evaluator-scenarios endpoint.
     *
     * @param string $progressID progress ID returned by the improve-evaluator-scenarios endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveScenarioAgentProgress(
        string $progressID,
        RequestOptions|array|null $requestOptions = null
    ): ScenarioGetScenarioAgentProgressResponse {
        $params = ['progressID' => $progressID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveScenarioAgentProgress(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Runs the selected evaluator scenarios against their test agents and creates a run batch. Returns the ID of the created batch, whose results can be listed with the test-run-results endpoints.
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
    ): ScenarioRunScenariosResponse {
        $params = array_filter(
            [
                'agentID' => $agentID ?? Omitted::VALUE,
                'agentNumber' => $agentNumber ?? Omitted::VALUE,
                'assistantID' => $assistantID ?? Omitted::VALUE,
                'concurrencyLimit' => $concurrencyLimit ?? Omitted::VALUE,
                'frequency' => $frequency ?? Omitted::VALUE,
                'mode' => $mode ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'outboundPhoneNumber' => $outboundPhoneNumber ?? Omitted::VALUE,
                'personalityIDs' => $personalityIDs ?? Omitted::VALUE,
                'scenarios' => $scenarios ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'testProfileIDs' => $testProfileIDs ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->runScenarios(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts an interactive session that improves selected evaluator scenarios from a natural-language instruction. Returns a progress ID to poll with the improve-scenarios-progress endpoint.
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
    ): ScenarioScenarioAgentResponse {
        $params = array_filter(
            [
                'scenarios' => $scenarios,
                'userMessage' => $userMessage,
                'agentID' => $agentID,
                'agentResolutionResponse' => $agentResolutionResponse ?? Omitted::VALUE,
                'applyChanges' => $applyChanges ?? Omitted::VALUE,
                'context' => $context,
                'knowledgeBase' => $knowledgeBase ?? Omitted::VALUE,
                'numScenarios' => $numScenarios ?? Omitted::VALUE,
                'pendingToolCalls' => $pendingToolCalls,
                'scenariosNeedingAgent' => $scenariosNeedingAgent ?? Omitted::VALUE,
                'sessionID' => $sessionID,
                'updatedScenarios' => $updatedScenarios ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->scenarioAgent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
