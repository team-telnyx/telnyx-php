<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams\Page;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunTriggerParams;
use Telnyx\Client;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites\RunsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $status Filter runs by execution status (pending, running, completed, failed, timeout)
     * @param string $testSuiteRunID Filter runs by specific suite execution batch ID
     *
     * @return PaginatedTestRunList<HasRawResponse>
     */
    public function list(
        string $suiteName,
        $page = omit,
        $status = omit,
        $testSuiteRunID = omit,
        ?RequestOptions $requestOptions = null,
    ): PaginatedTestRunList {
        [$parsed, $options] = RunListParams::parseRequest(
            [
                'page' => $page,
                'status' => $status,
                'testSuiteRunID' => $testSuiteRunID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/test-suites/%1$s/runs', $suiteName],
            query: $parsed,
            options: $options,
            convert: PaginatedTestRunList::class,
        );
    }

    /**
     * @api
     *
     * Executes all tests within a specific test suite as a batch operation
     *
     * @param string $destinationVersionID Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version
     *
     * @return list<TestRunResponse>
     */
    public function trigger(
        string $suiteName,
        $destinationVersionID = omit,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = RunTriggerParams::parseRequest(
            ['destinationVersionID' => $destinationVersionID],
            $requestOptions
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
