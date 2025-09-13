<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\RunListParams\Page;
use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface RunsContract
{
    /**
     * @api
     *
     * @param string $testID
     *
     * @return TestRunResponse<HasRawResponse>
     */
    public function retrieve(
        string $runID,
        $testID,
        ?RequestOptions $requestOptions = null
    ): TestRunResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $status Filter runs by execution status (pending, running, completed, failed, timeout)
     *
     * @return PaginatedTestRunList<HasRawResponse>
     */
    public function list(
        string $testID,
        $page = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): PaginatedTestRunList;

    /**
     * @api
     *
     * @param string $destinationVersionID Optional assistant version ID to use for this test run. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version
     *
     * @return TestRunResponse<HasRawResponse>
     */
    public function trigger(
        string $testID,
        $destinationVersionID = omit,
        ?RequestOptions $requestOptions = null,
    ): TestRunResponse;
}
