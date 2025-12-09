<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites\RunsContract;

final class RunsService implements RunsContract
{
    /**
     * @api
     */
    public RunsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RunsRawService($client);
    }

    /**
     * @api
     *
     * Retrieves paginated history of test runs for a specific test suite with filtering options
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $status Filter runs by execution status (pending, running, completed, failed, timeout)
     * @param string $testSuiteRunID Filter runs by specific suite execution batch ID
     *
     * @throws APIException
     */
    public function list(
        string $suiteName,
        ?array $page = null,
        ?string $status = null,
        ?string $testSuiteRunID = null,
        ?RequestOptions $requestOptions = null,
    ): PaginatedTestRunList {
        $params = [
            'page' => $page, 'status' => $status, 'testSuiteRunID' => $testSuiteRunID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($suiteName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Executes all tests within a specific test suite as a batch operation
     *
     * @param string $destinationVersionID Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version
     *
     * @return list<TestRunResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $suiteName,
        ?string $destinationVersionID = null,
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = ['destinationVersionID' => $destinationVersionID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->trigger($suiteName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
