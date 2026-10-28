<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\CreateAITestMetricRequest;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricBulkCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGenerateMetricsParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricListParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricRetrieveGenerateMetricsProgressParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricUpdateParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\MetricsRawContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type CreateAITestMetricRequestShape from \Telnyx\AI\Tests\TestFramework\V1\Metrics\CreateAITestMetricRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MetricsRawService implements MetricsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a metric in your organization.
     *
     * @param array{
     *   name: string,
     *   addToNewAgents?: bool|null,
     *   agents?: list<int>,
     *   assistantID?: string,
     *   audioEnabled?: bool,
     *   description?: string,
     *   displayOrder?: int,
     *   enumValues?: list<string>,
     *   evalType?: string,
     *   observabilityEnabled?: bool,
     *   prompt?: string,
     *   samplingEnabled?: bool,
     *   simulationEnabled?: bool,
     *   type?: string,
     * }|MetricCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AITestMetric>
     *
     * @throws APIException
     */
    public function create(
        array|MetricCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MetricCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/metrics',
            body: (object) $parsed,
            options: $options,
            convert: AITestMetric::class,
        );
    }

    /**
     * @api
     *
     * Returns the specified metric.
     *
     * @param int $id numeric ID of the metric
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AITestMetric>
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
            path: ['ai/tests/test_framework/v1/metrics/%1$s', $id],
            options: $requestOptions,
            convert: AITestMetric::class,
        );
    }

    /**
     * @api
     *
     * Updates the specified metric.
     *
     * @param int $id numeric ID of the metric
     * @param array{
     *   addToNewAgents?: bool|null,
     *   agents?: list<int>,
     *   audioEnabled?: bool,
     *   description?: string,
     *   displayOrder?: int,
     *   enumValues?: list<string>,
     *   evalType?: string,
     *   name?: string,
     *   observabilityEnabled?: bool,
     *   prompt?: string,
     *   samplingEnabled?: bool,
     *   simulationEnabled?: bool,
     *   type?: string,
     * }|MetricUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AITestMetric>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|MetricUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MetricUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/tests/test_framework/v1/metrics/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: AITestMetric::class,
        );
    }

    /**
     * @api
     *
     * Returns the metrics available in your organization, optionally filtered by test agent. Each metric scores one aspect of a conversation or scenario run.
     *
     * @param array{agentID?: int, assistantID?: string}|MetricListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AITestMetric>>
     *
     * @throws APIException
     */
    public function list(
        array|MetricListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MetricListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/metrics',
            query: Util::array_transform_keys(
                $parsed,
                ['agentID' => 'agent_id', 'assistantID' => 'assistant_id']
            ),
            options: $options,
            convert: new ListOf(AITestMetric::class),
        );
    }

    /**
     * @api
     *
     * Deletes the specified metric.
     *
     * @param int $id numeric ID of the metric
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
            path: ['ai/tests/test_framework/v1/metrics/%1$s', $id],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Creates several metrics in one request. Accepts an array of metric objects and returns the created metrics.
     *
     * @param array{
     *   body: list<CreateAITestMetricRequest|CreateAITestMetricRequestShape>
     * }|MetricBulkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AITestMetric>>
     *
     * @throws APIException
     */
    public function bulkCreate(
        array|MetricBulkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MetricBulkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/metrics/bulk_create',
            body: $parsed['body'],
            options: $options,
            convert: new ListOf(AITestMetric::class),
        );
    }

    /**
     * @api
     *
     * Starts background generation of suggested metrics for a test agent. Returns a progress ID to poll with the get-test-metric-generation-progress endpoint.
     *
     * @param array{
     *   agentID: int, numMetrics: int, scenarios?: list<int>
     * }|MetricGenerateMetricsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGenerationResponse>
     *
     * @throws APIException
     */
    public function generateMetrics(
        array|MetricGenerateMetricsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MetricGenerateMetricsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/metrics/generate_metrics',
            body: (object) $parsed,
            options: $options,
            convert: ScenarioGenerationResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the status of a background metric-generation job started with the generate-test-metrics endpoint.
     *
     * @param array{
     *   progressID: string
     * }|MetricRetrieveGenerateMetricsProgressParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MetricGetGenerateMetricsProgressResponse>
     *
     * @throws APIException
     */
    public function retrieveGenerateMetricsProgress(
        array|MetricRetrieveGenerateMetricsProgressParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MetricRetrieveGenerateMetricsProgressParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/metrics/generate_metrics_progress',
            query: Util::array_transform_keys(
                $parsed,
                ['progressID' => 'progress_id']
            ),
            options: $options,
            convert: MetricGetGenerateMetricsProgressResponse::class,
        );
    }
}
