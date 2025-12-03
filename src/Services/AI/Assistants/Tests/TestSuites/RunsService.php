<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunTriggerParams;
use Telnyx\Client;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites\RunsContract;

final class RunsService implements RunsContract
{
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
     *   page_number_?: int,
     *   page_size_?: int,
     *   status?: string,
     *   test_suite_run_id?: string,
     * }|RunListParams $params
     *
     * @return DefaultFlatPagination<TestRunResponse>
     *
     * @throws APIException
     */
    public function list(
        string $suiteName,
        array|RunListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        [$parsed, $options] = RunListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/test-suites/%1$s/runs', $suiteName],
            query: $parsed,
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
     * @param array{destination_version_id?: string}|RunTriggerParams $params
     *
     * @return list<TestRunResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $suiteName,
        array|RunTriggerParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = RunTriggerParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/tests/test-suites/%1$s/runs', $suiteName],
            body: (object) $parsed,
            options: $options,
            convert: new ListOf(TestRunResponse::class),
        );
    }
}
