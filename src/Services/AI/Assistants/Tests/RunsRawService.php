<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\Runs\RunRetrieveParams;
use Telnyx\AI\Assistants\Tests\Runs\RunTriggerParams;
use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\PaginatedTestRunList;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\RunsRawContract;

final class RunsRawService implements RunsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves detailed information about a specific test run execution
     *
     * @param array{testID: string}|RunRetrieveParams $params
     *
     * @return BaseResponse<TestRunResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        array|RunRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $testID = $parsed['testID'];
        unset($parsed['testID']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   page?: array{number?: int, size?: int}, status?: string
     * }|RunListParams $params
     *
     * @return BaseResponse<PaginatedTestRunList>
     *
     * @throws APIException
     */
    public function list(
        string $testID,
        array|RunListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{destinationVersionID?: string}|RunTriggerParams $params
     *
     * @return BaseResponse<TestRunResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $testID,
        array|RunTriggerParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunTriggerParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/tests/%1$s/runs', $testID],
            body: (object) $parsed,
            options: $options,
            convert: TestRunResponse::class,
        );
    }
}
