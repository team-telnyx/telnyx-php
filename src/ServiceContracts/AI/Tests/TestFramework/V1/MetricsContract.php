<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\CreateAITestMetricRequest;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CreateAITestMetricRequestShape from \Telnyx\AI\Tests\TestFramework\V1\Metrics\CreateAITestMetricRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MetricsContract
{
    /**
     * @api
     *
     * @param list<int> $agents
     * @param list<string> $enumValues
     * @param string $evalType what the metric scores: numeric, continuous_qualitative, or binary_workflow_adherence
     * @param string $prompt judge prompt used by llm_judge metrics
     * @param string $type how the metric is evaluated: custom_code or llm_judge
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        bool|Omitted|null $addToNewAgents = Omitted::VALUE,
        ?array $agents = null,
        ?string $assistantID = null,
        ?bool $audioEnabled = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?array $enumValues = null,
        ?string $evalType = null,
        ?bool $observabilityEnabled = null,
        ?string $prompt = null,
        ?bool $samplingEnabled = null,
        ?bool $simulationEnabled = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): AITestMetric;

    /**
     * @api
     *
     * @param int $id numeric ID of the metric
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): AITestMetric;

    /**
     * @api
     *
     * @param int $id numeric ID of the metric
     * @param list<int> $agents
     * @param list<string> $enumValues
     * @param string $evalType what the metric scores: numeric, continuous_qualitative, or binary_workflow_adherence
     * @param string $prompt judge prompt used by llm_judge metrics
     * @param string $type how the metric is evaluated: custom_code or llm_judge
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $id,
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
        RequestOptions|array|null $requestOptions = null,
    ): AITestMetric;

    /**
     * @api
     *
     * @param int $agentID filter metrics attached to the specified test agent
     * @param string $assistantID filter metrics attached to the specified Telnyx assistant
     * @param RequestOpts|null $requestOptions
     *
     * @return list<AITestMetric>
     *
     * @throws APIException
     */
    public function list(
        ?int $agentID = null,
        ?string $assistantID = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param int $id numeric ID of the metric
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
     * @param list<CreateAITestMetricRequest|CreateAITestMetricRequestShape> $body
     * @param RequestOpts|null $requestOptions
     *
     * @return list<AITestMetric>
     *
     * @throws APIException
     */
    public function bulkCreate(
        array $body,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param int $agentID test agent to suggest metrics for
     * @param int $numMetrics how many metrics to suggest
     * @param list<int> $scenarios scenario IDs to base the suggestions on
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateMetrics(
        int $agentID,
        int $numMetrics,
        ?array $scenarios = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScenarioGenerationResponse;

    /**
     * @api
     *
     * @param string $progressID progress ID returned by the generate-test-metrics endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveGenerateMetricsProgress(
        string $progressID,
        RequestOptions|array|null $requestOptions = null
    ): MetricGetGenerateMetricsProgressResponse;
}
