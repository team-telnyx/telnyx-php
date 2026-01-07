<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\RunsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        string $testID,
        RequestOptions|array|null $requestOptions = null,
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
     * @param string $status Filter runs by execution status (pending, running, completed, failed, timeout)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TestRunResponse>
     *
     * @throws APIException
     */
    public function list(
        string $testID,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'status' => $status,
            ],
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function trigger(
        string $testID,
        ?string $destinationVersionID = null,
        RequestOptions|array|null $requestOptions = null,
    ): TestRunResponse {
        $params = Util::removeNulls(
            ['destinationVersionID' => $destinationVersionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->trigger($testID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
