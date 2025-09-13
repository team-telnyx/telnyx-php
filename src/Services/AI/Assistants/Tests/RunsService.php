<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\Runs\RunListParams\Page;
use Telnyx\AI\Assistants\Tests\Runs\RunRetrieveParams;
use Telnyx\AI\Assistants\Tests\Runs\RunTriggerParams;
use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\RunsContract;

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
     * Retrieves detailed information about a specific test run execution
     *
     * @param string $testID
     *
     * @return TestRunResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        $testID,
        ?RequestOptions $requestOptions = null
    ): TestRunResponse {
        $params = ['testID' => $testID];

        return $this->retrieveRaw($runID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TestRunResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $runID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TestRunResponse {
        [$parsed, $options] = RunRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $testID = $parsed['testID'];
        unset($parsed['testID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/%1$s/runs/%2$s', $testID, $runID],
            options: $options,
            convert: TestRunResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves paginated execution history for a specific assistant test with filtering options
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $status Filter runs by execution status (pending, running, completed, failed, timeout)
     *
     * @return PaginatedTestRunList<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $testID,
        $page = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): PaginatedTestRunList {
        $params = ['page' => $page, 'status' => $status];

        return $this->listRaw($testID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PaginatedTestRunList<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $testID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PaginatedTestRunList {
        [$parsed, $options] = RunListParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/%1$s/runs', $testID],
            query: $parsed,
            options: $options,
            convert: PaginatedTestRunList::class,
        );
    }

    /**
     * @api
     *
     * Initiates immediate execution of a specific assistant test
     *
     * @param string $destinationVersionID Optional assistant version ID to use for this test run. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version
     *
     * @return TestRunResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $testID,
        $destinationVersionID = omit,
        ?RequestOptions $requestOptions = null,
    ): TestRunResponse {
        $params = ['destinationVersionID' => $destinationVersionID];

        return $this->triggerRaw($testID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TestRunResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function triggerRaw(
        string $testID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TestRunResponse {
        [$parsed, $options] = RunTriggerParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/tests/%1$s/runs', $testID],
            body: (object) $parsed,
            options: $options,
            convert: TestRunResponse::class,
        );
    }
}
