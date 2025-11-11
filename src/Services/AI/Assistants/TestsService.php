<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TelnyxConversationChannel;
use Telnyx\AI\Assistants\Tests\TestCreateParams;
use Telnyx\AI\Assistants\Tests\TestListParams;
use Telnyx\AI\Assistants\Tests\TestListResponse;
use Telnyx\AI\Assistants\Tests\TestUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\TestsContract;
use Telnyx\Services\AI\Assistants\Tests\RunsService;
use Telnyx\Services\AI\Assistants\Tests\TestSuitesService;

final class TestsService implements TestsContract
{
    /**
     * @api
     */
    public TestSuitesService $testSuites;

    /**
     * @api
     */
    public RunsService $runs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->testSuites = new TestSuitesService($client);
        $this->runs = new RunsService($client);
    }

    /**
     * @api
     *
     * Creates a comprehensive test configuration for evaluating AI assistant performance
     *
     * @param array{
     *   destination: string,
     *   instructions: string,
     *   name: string,
     *   rubric: list<array{criteria: string, name: string}>,
     *   description?: string,
     *   max_duration_seconds?: int,
     *   telnyx_conversation_channel?: "phone_call"|"web_call"|"sms_chat"|"web_chat"|TelnyxConversationChannel,
     *   test_suite?: string,
     * }|TestCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TestCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): AssistantTest {
        [$parsed, $options] = TestCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/assistants/tests',
            body: (object) $parsed,
            options: $options,
            convert: AssistantTest::class,
        );
    }

    /**
     * @api
     *
     * Retrieves detailed information about a specific assistant test
     *
     * @throws APIException
     */
    public function retrieve(
        string $testID,
        ?RequestOptions $requestOptions = null
    ): AssistantTest {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/%1$s', $testID],
            options: $requestOptions,
            convert: AssistantTest::class,
        );
    }

    /**
     * @api
     *
     * Updates an existing assistant test configuration with new settings
     *
     * @param array{
     *   description?: string,
     *   destination?: string,
     *   instructions?: string,
     *   max_duration_seconds?: int,
     *   name?: string,
     *   rubric?: list<array{criteria: string, name: string}>,
     *   telnyx_conversation_channel?: "phone_call"|"web_call"|"sms_chat"|"web_chat"|TelnyxConversationChannel,
     *   test_suite?: string,
     * }|TestUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $testID,
        array|TestUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssistantTest {
        [$parsed, $options] = TestUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['ai/assistants/tests/%1$s', $testID],
            body: (object) $parsed,
            options: $options,
            convert: AssistantTest::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a paginated list of assistant tests with optional filtering capabilities
     *
     * @param array{
     *   destination?: string,
     *   page?: array{number?: int, size?: int},
     *   telnyx_conversation_channel?: string,
     *   test_suite?: string,
     * }|TestListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TestListParams $params,
        ?RequestOptions $requestOptions = null
    ): TestListResponse {
        [$parsed, $options] = TestListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/assistants/tests',
            query: $parsed,
            options: $options,
            convert: TestListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently removes an assistant test and all associated data
     *
     * @throws APIException
     */
    public function delete(
        string $testID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/assistants/tests/%1$s', $testID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
