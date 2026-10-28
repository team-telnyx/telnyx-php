<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Results\ResultListParams;
use Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\ResultsRawContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ResultsRawService implements ResultsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the specified test run batch, optionally with per-run detail.
     *
     * @param int $id numeric ID of the test run batch
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestRunResult>
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
            path: ['ai/tests/test_framework/v1/results/%1$s', $id],
            options: $requestOptions,
            convert: TestRunResult::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of test run batches in your organization, optionally filtered by test agent, search text, or scenarios.
     *
     * @param array{
     *   agentID?: int, page?: int, pageSize?: int, scenarios?: string, search?: string
     * }|ResultListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ResultListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ResultListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ResultListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/results',
            query: Util::array_transform_keys(
                $parsed,
                ['agentID' => 'agent_id', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: ResultListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the specified test run batch.
     *
     * @param int $id numeric ID of the test run batch
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
            path: ['ai/tests/test_framework/v1/results/%1$s', $id],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Re-executes the scenarios of the specified test run batch and creates a new run batch.
     *
     * @param int $id numeric ID of the test run batch to rerun
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestRunResult>
     *
     * @throws APIException
     */
    public function rerun(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/tests/test_framework/v1/results/%1$s/rerun', $id],
            options: $requestOptions,
            convert: TestRunResult::class,
        );
    }
}
