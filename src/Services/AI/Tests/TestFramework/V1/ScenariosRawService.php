<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGenerateBgParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGenerateBgParams\ScenarioType;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetGenerateProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveExportScenariosParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveExportScenariosParams\ExportType;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveGenerateProgressParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveScenarioAgentProgressParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Mode;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Context;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\ScenariosRawContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Scenarios
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Scenarios as ScenariosShape1
 * @phpstan-import-type ContextShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams\Context
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ScenariosRawService implements ScenariosRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an evaluator scenario in your organization.
     *
     * @param array{
     *   name: string,
     *   personality: int,
     *   agent?: int|null,
     *   expectedOutcomePrompt?: string,
     *   firstMessage?: string,
     *   folderPath?: string|null,
     *   instructions?: string,
     *   metrics?: list<int>,
     *   tags?: list<string>,
     *   testProfile?: int,
     * }|ScenarioCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EvaluatorScenarioDetail>
     *
     * @throws APIException
     */
    public function create(
        array|ScenarioCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/scenarios',
            body: (object) $parsed,
            options: $options,
            convert: EvaluatorScenarioDetail::class,
        );
    }

    /**
     * @api
     *
     * Returns the specified evaluator scenario with full detail.
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EvaluatorScenarioDetail>
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/tests/test_framework/v1/scenarios/%1$s', $id],
            options: $requestOptions,
            convert: EvaluatorScenarioDetail::class,
        );
    }

    /**
     * @api
     *
     * Updates the specified evaluator scenario.
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param array{
     *   agent?: int|null,
     *   expectedOutcomePrompt?: string,
     *   firstMessage?: string,
     *   folderPath?: string|null,
     *   inboundPhoneNumber?: int,
     *   instructions?: string,
     *   maxDuration?: int|null,
     *   metrics?: list<int>,
     *   name?: string,
     *   personality?: int,
     *   phoneNumber?: int,
     *   scenarioLanguage?: string,
     *   tags?: list<string>,
     *   testProfile?: int,
     *   toolIDs?: list<string>,
     * }|ScenarioUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EvaluatorScenarioDetail>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|ScenarioUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/tests/test_framework/v1/scenarios/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: EvaluatorScenarioDetail::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of evaluator scenarios in your organization, optionally filtered by test agent or tags.
     *
     * @param array{
     *   agentID?: int, assistantID?: string, page?: int, pageSize?: int, tags?: string
     * }|ScenarioListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ScenarioListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/scenarios',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'agentID' => 'agent_id',
                    'assistantID' => 'assistant_id',
                    'pageSize' => 'page_size',
                ],
            ),
            options: $options,
            convert: ScenarioListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the specified evaluator scenario.
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/tests/test_framework/v1/scenarios/%1$s', $id],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Starts background generation of evaluator scenarios for a test agent. Returns a progress ID to poll with the generate-scenarios-progress endpoint.
     *
     * @param array{
     *   numScenarios: int,
     *   agentID?: int,
     *   extraInstructions?: string,
     *   firstMessage?: string,
     *   folderPath?: string|null,
     *   generateExpectedOutcomes?: bool,
     *   inboundPhoneNumber?: int|null,
     *   personalities?: list<int>,
     *   scenarioType?: ScenarioType|value-of<ScenarioType>,
     *   tags?: list<string>,
     *   testProfile?: int,
     *   toolIDs?: list<string>,
     * }|ScenarioGenerateBgParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGenerationResponse>
     *
     * @throws APIException
     */
    public function generateBg(
        array|ScenarioGenerateBgParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioGenerateBgParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/scenarios/generate-bg',
            body: (object) $parsed,
            options: $options,
            convert: ScenarioGenerationResponse::class,
        );
    }

    /**
     * @api
     *
     * Exports the selected evaluator scenarios as a CSV or XLSX file download.
     *
     * @param array{
     *   exportType: ExportType|value-of<ExportType>,
     *   scenarioIDs: string,
     *   agentID?: int,
     * }|ScenarioRetrieveExportScenariosParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveExportScenarios(
        array|ScenarioRetrieveExportScenariosParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioRetrieveExportScenariosParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/scenarios/export_scenarios',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'exportType' => 'export_type',
                    'scenarioIDs' => 'scenario_ids',
                    'agentID' => 'agent_id',
                ],
            ),
            headers: [
                'Accept' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Returns the status of a background scenario-generation job started with the generate-evaluator-scenarios endpoint.
     *
     * @param array{progressID: string}|ScenarioRetrieveGenerateProgressParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGetGenerateProgressResponse>
     *
     * @throws APIException
     */
    public function retrieveGenerateProgress(
        array|ScenarioRetrieveGenerateProgressParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioRetrieveGenerateProgressParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/scenarios/generate-progress',
            query: Util::array_transform_keys(
                $parsed,
                ['progressID' => 'progress_id']
            ),
            options: $options,
            convert: ScenarioGetGenerateProgressResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the status of an improve-scenarios session started with the improve-evaluator-scenarios endpoint.
     *
     * @param array{
     *   progressID: string
     * }|ScenarioRetrieveScenarioAgentProgressParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGetScenarioAgentProgressResponse>
     *
     * @throws APIException
     */
    public function retrieveScenarioAgentProgress(
        array|ScenarioRetrieveScenarioAgentProgressParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioRetrieveScenarioAgentProgressParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/scenarios/scenario-agent-progress',
            query: Util::array_transform_keys(
                $parsed,
                ['progressID' => 'progress_id']
            ),
            options: $options,
            convert: ScenarioGetScenarioAgentProgressResponse::class,
        );
    }

    /**
     * @api
     *
     * Runs the selected evaluator scenarios against their test agents and creates a run batch. Returns the ID of the created batch, whose results can be listed with the test-run-results endpoints.
     *
     * @param array{
     *   agentID?: int,
     *   agentNumber?: string,
     *   assistantID?: string,
     *   concurrencyLimit?: int,
     *   frequency?: int,
     *   mode?: Mode|value-of<Mode>,
     *   name?: string,
     *   outboundPhoneNumber?: string,
     *   personalityIDs?: list<int>,
     *   scenarios?: ScenariosShape,
     *   tags?: list<string>,
     *   testProfileIDs?: list<int>,
     * }|ScenarioRunScenariosParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioRunScenariosResponse>
     *
     * @throws APIException
     */
    public function runScenarios(
        array|ScenarioRunScenariosParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioRunScenariosParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/scenarios/run_scenarios',
            body: (object) $parsed,
            options: $options,
            convert: ScenarioRunScenariosResponse::class,
        );
    }

    /**
     * @api
     *
     * Starts an interactive session that improves selected evaluator scenarios from a natural-language instruction. Returns a progress ID to poll with the improve-scenarios-progress endpoint.
     *
     * @param array{
     *   scenarios: ScenariosShape1,
     *   userMessage: string,
     *   agentID?: int|null,
     *   agentResolutionResponse?: string,
     *   applyChanges?: bool,
     *   context?: list<Context|ContextShape>|null,
     *   knowledgeBase?: list<int>,
     *   numScenarios?: int,
     *   pendingToolCalls?: list<array<string,mixed>>|null,
     *   scenariosNeedingAgent?: list<int>,
     *   sessionID?: int|null,
     *   updatedScenarios?: list<array<string,mixed>>,
     * }|ScenarioScenarioAgentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioScenarioAgentResponse>
     *
     * @throws APIException
     */
    public function scenarioAgent(
        array|ScenarioScenarioAgentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ScenarioScenarioAgentParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/scenarios/scenario-agent',
            body: (object) $parsed,
            options: $options,
            convert: ScenarioScenarioAgentResponse::class,
        );
    }
}
