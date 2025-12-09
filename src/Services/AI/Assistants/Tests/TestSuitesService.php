<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestSuites\TestSuiteListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuitesContract;
use Telnyx\Services\AI\Assistants\Tests\TestSuites\RunsService;

final class TestSuitesService implements TestSuitesContract
{
    /**
     * @api
     */
    public TestSuitesRawService $raw;

    /**
     * @api
     */
    public RunsService $runs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TestSuitesRawService($client);
        $this->runs = new RunsService($client);
    }

    /**
     * @api
     *
     * Retrieves a list of all distinct test suite names available to the current user
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): TestSuiteListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
