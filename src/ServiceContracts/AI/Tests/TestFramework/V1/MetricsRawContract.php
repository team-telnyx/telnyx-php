<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricBulkCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGenerateMetricsParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricListParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricRetrieveGenerateMetricsProgressParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricUpdateParams;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MetricsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MetricCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AITestMetric>
     *
     * @throws APIException
     */
    public function create(
        array|MetricCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the metric
     * @param array<string,mixed>|MetricUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MetricListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AITestMetric>>
     *
     * @throws APIException
     */
    public function list(
        array|MetricListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MetricBulkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AITestMetric>>
     *
     * @throws APIException
     */
    public function bulkCreate(
        array|MetricBulkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MetricGenerateMetricsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScenarioGenerationResponse>
     *
     * @throws APIException
     */
    public function generateMetrics(
        array|MetricGenerateMetricsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MetricRetrieveGenerateMetricsProgressParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MetricGetGenerateMetricsProgressResponse>
     *
     * @throws APIException
     */
    public function retrieveGenerateMetricsProgress(
        array|MetricRetrieveGenerateMetricsProgressParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
