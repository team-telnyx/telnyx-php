<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\Runs\RunRetrieveParams;
use Telnyx\AI\Assistants\Tests\Runs\RunTriggerParams;
use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\RunsContract;

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
     * @param array{test_id: string}|RunRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        array|RunRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TestRunResponse {
        [$parsed, $options] = RunRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $testID = $parsed['test_id'];
        unset($parsed['test_id']);

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
     * @param array{
     *   page_number_?: int, page_size_?: int, status?: string
     * }|RunListParams $params
     *
     * @return DefaultFlatPagination<TestRunResponse>
     *
     * @throws APIException
     */
    public function list(
        string $testID,
        array|RunListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        [$parsed, $options] = RunListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/%1$s/runs', $testID],
            query: $parsed,
            options: $options,
            convert: TestRunResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Initiates immediate execution of a specific assistant test
     *
     * @param array{destination_version_id?: string}|RunTriggerParams $params
     *
     * @throws APIException
     */
    public function trigger(
        string $testID,
        array|RunTriggerParams $params,
        ?RequestOptions $requestOptions = null,
    ): TestRunResponse {
        [$parsed, $options] = RunTriggerParams::parseRequest(
            $params,
            $requestOptions,
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
