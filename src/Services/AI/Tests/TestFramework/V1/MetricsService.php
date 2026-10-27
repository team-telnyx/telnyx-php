<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\CreateAITestMetricRequest;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\MetricsContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type CreateAITestMetricRequestShape from \Telnyx\AI\Tests\TestFramework\V1\Metrics\CreateAITestMetricRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MetricsService implements MetricsContract
{
    /**
     * @api
     */
    public MetricsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MetricsRawService($client);
    }

    /**
     * @api
     *
     * Creates a metric in your organization.
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
    ): AITestMetric {
        $params = array_filter(
            [
                'name' => $name,
                'addToNewAgents' => $addToNewAgents,
                'agents' => $agents ?? Omitted::VALUE,
                'assistantID' => $assistantID ?? Omitted::VALUE,
                'audioEnabled' => $audioEnabled ?? Omitted::VALUE,
                'description' => $description ?? Omitted::VALUE,
                'displayOrder' => $displayOrder ?? Omitted::VALUE,
                'enumValues' => $enumValues ?? Omitted::VALUE,
                'evalType' => $evalType ?? Omitted::VALUE,
                'observabilityEnabled' => $observabilityEnabled ?? Omitted::VALUE,
                'prompt' => $prompt ?? Omitted::VALUE,
                'samplingEnabled' => $samplingEnabled ?? Omitted::VALUE,
                'simulationEnabled' => $simulationEnabled ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
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
     * Returns the specified metric.
     *
     * @param int $id numeric ID of the metric
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): AITestMetric {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified metric.
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
    ): AITestMetric {
        $params = array_filter(
            [
                'addToNewAgents' => $addToNewAgents,
                'agents' => $agents ?? Omitted::VALUE,
                'audioEnabled' => $audioEnabled ?? Omitted::VALUE,
                'description' => $description ?? Omitted::VALUE,
                'displayOrder' => $displayOrder ?? Omitted::VALUE,
                'enumValues' => $enumValues ?? Omitted::VALUE,
                'evalType' => $evalType ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'observabilityEnabled' => $observabilityEnabled ?? Omitted::VALUE,
                'prompt' => $prompt ?? Omitted::VALUE,
                'samplingEnabled' => $samplingEnabled ?? Omitted::VALUE,
                'simulationEnabled' => $simulationEnabled ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
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
     * Returns the metrics available in your organization, optionally filtered by test agent. Each metric scores one aspect of a conversation or scenario run.
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
    ): array {
        $params = array_filter(
            [
                'agentID' => $agentID ?? Omitted::VALUE,
                'assistantID' => $assistantID ?? Omitted::VALUE,
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
     * Deletes the specified metric.
     *
     * @param int $id numeric ID of the metric
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
     * Creates several metrics in one request. Accepts an array of metric objects and returns the created metrics.
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
    ): array {
        $params = ['body' => $body];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bulkCreate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts background generation of suggested metrics for a test agent. Returns a progress ID to poll with the get-test-metric-generation-progress endpoint.
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
    ): ScenarioGenerationResponse {
        $params = array_filter(
            [
                'agentID' => $agentID,
                'numMetrics' => $numMetrics,
                'scenarios' => $scenarios ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateMetrics(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of a background metric-generation job started with the generate-test-metrics endpoint.
     *
     * @param string $progressID progress ID returned by the generate-test-metrics endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveGenerateMetricsProgress(
        string $progressID,
        RequestOptions|array|null $requestOptions = null
    ): MetricGetGenerateMetricsProgressResponse {
        $params = ['progressID' => $progressID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveGenerateMetricsProgress(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
