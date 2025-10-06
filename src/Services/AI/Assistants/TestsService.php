<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TelnyxConversationChannel;
use Telnyx\AI\Assistants\Tests\TestCreateParams;
use Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric;
use Telnyx\AI\Assistants\Tests\TestListParams;
use Telnyx\AI\Assistants\Tests\TestListParams\Page;
use Telnyx\AI\Assistants\Tests\TestListResponse;
use Telnyx\AI\Assistants\Tests\TestUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\TestsContract;
use Telnyx\Services\AI\Assistants\Tests\RunsService;
use Telnyx\Services\AI\Assistants\Tests\TestSuitesService;

use const Telnyx\Core\OMIT as omit;

final class TestsService implements TestsContract
{
    /**
     * @@api
     */
    public TestSuitesService $testSuites;

    /**
     * @@api
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
     * @param string $destination The target destination for the test conversation. Format depends on the channel: phone number for SMS/voice, webhook URL for web chat, etc.
     * @param string $instructions Detailed instructions that define the test scenario and what the assistant should accomplish. This guides the test execution and evaluation.
     * @param string $name A descriptive name for the assistant test. This will be used to identify the test in the UI and reports.
     * @param list<Rubric> $rubric Evaluation criteria used to assess the assistant's performance. Each rubric item contains a name and specific criteria for evaluation.
     * @param string $description Optional detailed description of what this test evaluates and its purpose. Helps team members understand the test's objectives.
     * @param int $maxDurationSeconds Maximum duration in seconds that the test conversation should run before timing out. If not specified, uses system default timeout.
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel The communication channel through which the test will be conducted. Determines how the assistant will receive and respond to test messages.
     * @param string $testSuite Optional test suite name to group related tests together. Useful for organizing tests by feature, team, or release cycle.
     *
     * @throws APIException
     */
    public function create(
        $destination,
        $instructions,
        $name,
        $rubric,
        $description = omit,
        $maxDurationSeconds = omit,
        $telnyxConversationChannel = omit,
        $testSuite = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantTest {
        $params = [
            'destination' => $destination,
            'instructions' => $instructions,
            'name' => $name,
            'rubric' => $rubric,
            'description' => $description,
            'maxDurationSeconds' => $maxDurationSeconds,
            'telnyxConversationChannel' => $telnyxConversationChannel,
            'testSuite' => $testSuite,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssistantTest {
        [$parsed, $options] = TestCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $description updated description of the test's purpose and evaluation criteria
     * @param string $destination updated target destination for test conversations
     * @param string $instructions updated test scenario instructions and objectives
     * @param int $maxDurationSeconds updated maximum test duration in seconds
     * @param string $name Updated name for the assistant test. Must be unique and descriptive.
     * @param list<TestUpdateParams\Rubric> $rubric updated evaluation criteria for assessing assistant performance
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel updated communication channel for the test execution
     * @param string $testSuite updated test suite assignment for better organization
     *
     * @throws APIException
     */
    public function update(
        string $testID,
        $description = omit,
        $destination = omit,
        $instructions = omit,
        $maxDurationSeconds = omit,
        $name = omit,
        $rubric = omit,
        $telnyxConversationChannel = omit,
        $testSuite = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantTest {
        $params = [
            'description' => $description,
            'destination' => $destination,
            'instructions' => $instructions,
            'maxDurationSeconds' => $maxDurationSeconds,
            'name' => $name,
            'rubric' => $rubric,
            'telnyxConversationChannel' => $telnyxConversationChannel,
            'testSuite' => $testSuite,
        ];

        return $this->updateRaw($testID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $testID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssistantTest {
        [$parsed, $options] = TestUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $destination Filter tests by destination (phone number, webhook URL, etc.)
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $telnyxConversationChannel Filter tests by communication channel (e.g., 'web_chat', 'sms')
     * @param string $testSuite Filter tests by test suite name
     *
     * @throws APIException
     */
    public function list(
        $destination = omit,
        $page = omit,
        $telnyxConversationChannel = omit,
        $testSuite = omit,
        ?RequestOptions $requestOptions = null,
    ): TestListResponse {
        $params = [
            'destination' => $destination,
            'page' => $page,
            'telnyxConversationChannel' => $telnyxConversationChannel,
            'testSuite' => $testSuite,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TestListResponse {
        [$parsed, $options] = TestListParams::parseRequest(
            $params,
            $requestOptions
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
