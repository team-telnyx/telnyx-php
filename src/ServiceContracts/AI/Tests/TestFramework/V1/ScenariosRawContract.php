<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGenerateBgParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetGenerateProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveExportScenariosParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveGenerateProgressParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveScenarioAgentProgressParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ScenariosRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EvaluatorScenarioDetail>
     *
     * @throws APIException
     */
    public function create(
        array|ScenarioCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the evaluator scenario
     * @param array<string,mixed>|ScenarioUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ScenarioListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioGenerateBgParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGenerationResponse>
     *
     * @throws APIException
     */
    public function generateBg(
        array|ScenarioGenerateBgParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioRetrieveExportScenariosParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveExportScenarios(
        array|ScenarioRetrieveExportScenariosParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioRetrieveGenerateProgressParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGetGenerateProgressResponse>
     *
     * @throws APIException
     */
    public function retrieveGenerateProgress(
        array|ScenarioRetrieveGenerateProgressParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioRetrieveScenarioAgentProgressParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGetScenarioAgentProgressResponse>
     *
     * @throws APIException
     */
    public function retrieveScenarioAgentProgress(
        array|ScenarioRetrieveScenarioAgentProgressParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioRunScenariosParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioRunScenariosResponse>
     *
     * @throws APIException
     */
    public function runScenarios(
        array|ScenarioRunScenariosParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScenarioScenarioAgentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioScenarioAgentResponse>
     *
     * @throws APIException
     */
    public function scenarioAgent(
        array|ScenarioScenarioAgentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
