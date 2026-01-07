<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RunsContract
{
    /**
     * @api
     *
     * @param string $status Filter runs by execution status (pending, running, completed, failed, timeout)
     * @param string $testSuiteRunID Filter runs by specific suite execution batch ID
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TestRunResponse>
     *
     * @throws APIException
     */
    public function list(
        string $suiteName,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $status = null,
        ?string $testSuiteRunID = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $destinationVersionID Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version
     * @param RequestOpts|null $requestOptions
     *
     * @return list<TestRunResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $suiteName,
        ?string $destinationVersionID = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
