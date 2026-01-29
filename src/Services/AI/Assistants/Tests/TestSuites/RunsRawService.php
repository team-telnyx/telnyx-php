<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunTriggerParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites\RunsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RunsRawService implements RunsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves paginated history of test runs for a specific test suite with filtering options
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, status?: string, testSuiteRunID?: string
     * }|RunListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TestRunResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $suiteName,
        array|RunListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/test-suites/%1$s/runs', $suiteName],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'testSuiteRunID' => 'test_suite_run_id',
                ],
            ),
            options: $options,
            convert: TestRunResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Executes all tests within a specific test suite as a batch operation
     *
     * @param array{destinationVersionID?: string}|RunTriggerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<TestRunResponse>>
     *
     * @throws APIException
     */
    public function trigger(
        string $suiteName,
        array|RunTriggerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunTriggerParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/tests/test-suites/%1$s/runs', $suiteName],
            body: (object) $parsed,
            options: $options,
            convert: new ListOf(TestRunResponse::class),
        );
    }
}
