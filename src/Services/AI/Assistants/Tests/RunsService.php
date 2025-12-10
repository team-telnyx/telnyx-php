<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\RunsContract;

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
     * Retrieves detailed information about a specific test run execution
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        string $testID,
        ?RequestOptions $requestOptions = null
    ): TestRunResponse {
        $params = Util::removeNulls(['testID' => $testID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves paginated execution history for a specific assistant test with filtering options
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $status Filter runs by execution status (pending, running, completed, failed, timeout)
     *
     * @throws APIException
     */
    public function list(
        string $testID,
        ?array $page = null,
        ?string $status = null,
        ?RequestOptions $requestOptions = null,
    ): PaginatedTestRunList {
        $params = Util::removeNulls(['page' => $page, 'status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($testID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Initiates immediate execution of a specific assistant test
     *
     * @param string $destinationVersionID Optional assistant version ID to use for this test run. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version
     *
     * @throws APIException
     */
    public function trigger(
        string $testID,
        ?string $destinationVersionID = null,
        ?RequestOptions $requestOptions = null,
    ): TestRunResponse {
        $params = Util::removeNulls(
            ['destinationVersionID' => $destinationVersionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->trigger($testID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
