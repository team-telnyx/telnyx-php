<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ResultsContract
{
    /**
     * @api
     *
     * @param int $id numeric ID of the test run batch
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): TestRunResult;

    /**
     * @api
     *
     * @param int $agentID filter results belonging to the specified test agent
     * @param int $page page number (1-based)
     * @param int $pageSize number of results per page
     * @param string $scenarios filter results by a comma-separated list of scenario IDs
     * @param string $search filter results by a search string
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $agentID = null,
        int $page = 1,
        int $pageSize = 25,
        ?string $scenarios = null,
        ?string $search = null,
        RequestOptions|array|null $requestOptions = null,
    ): ResultListResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the test run batch
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $id numeric ID of the test run batch to rerun
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rerun(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): TestRunResult;
}
