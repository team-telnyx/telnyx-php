<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface RunsContract
{
    /**
     * @api
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
    ): PaginatedTestRunList;

    /**
     * @api
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
    ): array;
}
