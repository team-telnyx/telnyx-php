<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\ResultsContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ResultsService implements ResultsContract
{
    /**
     * @api
     */
    public ResultsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ResultsRawService($client);
    }

    /**
     * @api
     *
     * Returns the specified test run batch, optionally with per-run detail.
     *
     * @param int $id numeric ID of the test run batch
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): TestRunResult {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of test run batches in your organization, optionally filtered by test agent, search text, or scenarios.
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
    ): ResultListResponse {
        $params = array_filter(
            [
                'agentID' => $agentID ?? Omitted::VALUE,
                'page' => $page,
                'pageSize' => $pageSize,
                'scenarios' => $scenarios ?? Omitted::VALUE,
                'search' => $search ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the specified test run batch.
     *
     * @param int $id numeric ID of the test run batch
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Re-executes the scenarios of the specified test run batch and creates a new run batch.
     *
     * @param int $id numeric ID of the test run batch to rerun
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rerun(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): TestRunResult {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rerun($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
