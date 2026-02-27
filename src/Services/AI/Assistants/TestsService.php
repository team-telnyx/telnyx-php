<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TelnyxConversationChannel;
use Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\TestsContract;
use Telnyx\Services\AI\Assistants\Tests\RunsService;
use Telnyx\Services\AI\Assistants\Tests\TestSuitesService;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RubricShape from \Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric
 * @phpstan-import-type RubricShape from \Telnyx\AI\Assistants\Tests\TestUpdateParams\Rubric as RubricShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TestsService implements TestsContract
{
    /**
     * @api
     */
    public TestsRawService $raw;

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
        $this->raw = new TestsRawService($client);
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
     * @param list<Rubric|RubricShape> $rubric Evaluation criteria used to assess the assistant's performance. Each rubric item contains a name and specific criteria for evaluation.
     * @param string $description Optional detailed description of what this test evaluates and its purpose. Helps team members understand the test's objectives.
     * @param int $maxDurationSeconds Maximum duration in seconds that the test conversation should run before timing out. If not specified, uses system default timeout.
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel The communication channel through which the test will be conducted. Determines how the assistant will receive and respond to test messages.
     * @param string $testSuite Optional test suite name to group related tests together. Useful for organizing tests by feature, team, or release cycle.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $destination,
        string $instructions,
        string $name,
        array $rubric,
        ?string $description = null,
        ?int $maxDurationSeconds = null,
        TelnyxConversationChannel|string|null $telnyxConversationChannel = null,
        ?string $testSuite = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantTest {
        $params = Util::removeNulls(
            [
                'destination' => $destination,
                'instructions' => $instructions,
                'name' => $name,
                'rubric' => $rubric,
                'description' => $description,
                'maxDurationSeconds' => $maxDurationSeconds,
                'telnyxConversationChannel' => $telnyxConversationChannel,
                'testSuite' => $testSuite,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves detailed information about a specific assistant test
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $testID,
        RequestOptions|array|null $requestOptions = null
    ): AssistantTest {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($testID, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param list<\Telnyx\AI\Assistants\Tests\TestUpdateParams\Rubric|RubricShape1> $rubric updated evaluation criteria for assessing assistant performance
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel updated communication channel for the test execution
     * @param string $testSuite updated test suite assignment for better organization
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $testID,
        ?string $description = null,
        ?string $destination = null,
        ?string $instructions = null,
        ?int $maxDurationSeconds = null,
        ?string $name = null,
        ?array $rubric = null,
        TelnyxConversationChannel|string|null $telnyxConversationChannel = null,
        ?string $testSuite = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantTest {
        $params = Util::removeNulls(
            [
                'description' => $description,
                'destination' => $destination,
                'instructions' => $instructions,
                'maxDurationSeconds' => $maxDurationSeconds,
                'name' => $name,
                'rubric' => $rubric,
                'telnyxConversationChannel' => $telnyxConversationChannel,
                'testSuite' => $testSuite,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($testID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a paginated list of assistant tests with optional filtering capabilities
     *
     * @param string $destination Filter tests by destination (phone number, webhook URL, etc.)
     * @param string $telnyxConversationChannel Filter tests by communication channel (e.g., 'web_chat', 'sms')
     * @param string $testSuite Filter tests by test suite name
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AssistantTest>
     *
     * @throws APIException
     */
    public function list(
        ?string $destination = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $telnyxConversationChannel = null,
        ?string $testSuite = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'destination' => $destination,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'telnyxConversationChannel' => $telnyxConversationChannel,
                'testSuite' => $testSuite,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently removes an assistant test and all associated data
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $testID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($testID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
