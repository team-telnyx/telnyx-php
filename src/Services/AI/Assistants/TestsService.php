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
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
     *   maxDurationSeconds?: int,
     *   telnyxConversationChannel?: 'phone_call'|'web_call'|'sms_chat'|'web_chat'|TelnyxConversationChannel,
     *   testSuite?: string,
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

        /** @var BaseResponse<AssistantTest> */
        $response = $this->client->request(
            method: 'post',
            path: 'ai/assistants/tests',
            body: (object) $parsed,
            options: $options,
            convert: AssistantTest::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<AssistantTest> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/%1$s', $testID],
            options: $requestOptions,
            convert: AssistantTest::class,
        );

        return $response->parse();
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
     *   maxDurationSeconds?: int,
     *   name?: string,
     *   rubric?: list<array{criteria: string, name: string}>,
     *   telnyxConversationChannel?: 'phone_call'|'web_call'|'sms_chat'|'web_chat'|TelnyxConversationChannel,
     *   testSuite?: string,
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

        /** @var BaseResponse<AssistantTest> */
        $response = $this->client->request(
            method: 'put',
            path: ['ai/assistants/tests/%1$s', $testID],
            body: (object) $parsed,
            options: $options,
            convert: AssistantTest::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a paginated list of assistant tests with optional filtering capabilities
     *
     * @param array{
     *   destination?: string,
     *   page?: array{number?: int, size?: int},
     *   telnyxConversationChannel?: string,
     *   testSuite?: string,
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

        /** @var BaseResponse<TestListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'ai/assistants/tests',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'telnyxConversationChannel' => 'telnyx_conversation_channel',
                    'testSuite' => 'test_suite',
                ],
            ),
            options: $options,
            convert: TestListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['ai/assistants/tests/%1$s', $testID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
