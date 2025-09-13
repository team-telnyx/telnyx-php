<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams\Page;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface RunsContract
{
    /**
     * @api
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
    ): PaginatedTestRunList;

    /**
     * @api
     *
     * @param string $destinationVersionID Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version
     *
     * @return list<TestRunResponse>
     */
    public function trigger(
        string $suiteName,
        $destinationVersionID = omit,
        ?RequestOptions $requestOptions = null,
    ): array;
}
