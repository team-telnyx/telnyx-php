<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestSuites\TestSuiteListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuitesRawContract;

final class TestSuitesRawService implements TestSuitesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves a list of all distinct test suite names available to the current user
     *
     * @return BaseResponse<TestSuiteListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/assistants/tests/test-suites',
            options: $requestOptions,
            convert: TestSuiteListResponse::class,
        );
    }
}
