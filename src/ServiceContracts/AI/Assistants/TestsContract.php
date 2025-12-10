<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TelnyxConversationChannel;
use Telnyx\AI\Assistants\Tests\TestListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface TestsContract
{
    /**
     * @api
     *
     * @param string $destination The target destination for the test conversation. Format depends on the channel: phone number for SMS/voice, webhook URL for web chat, etc.
     * @param string $instructions Detailed instructions that define the test scenario and what the assistant should accomplish. This guides the test execution and evaluation.
     * @param string $name A descriptive name for the assistant test. This will be used to identify the test in the UI and reports.
     * @param list<array{
     *   criteria: string, name: string
     * }> $rubric Evaluation criteria used to assess the assistant's performance. Each rubric item contains a name and specific criteria for evaluation.
     * @param string $description Optional detailed description of what this test evaluates and its purpose. Helps team members understand the test's objectives.
     * @param int $maxDurationSeconds Maximum duration in seconds that the test conversation should run before timing out. If not specified, uses system default timeout.
     * @param 'phone_call'|'web_call'|'sms_chat'|'web_chat'|TelnyxConversationChannel $telnyxConversationChannel The communication channel through which the test will be conducted. Determines how the assistant will receive and respond to test messages.
     * @param string $testSuite Optional test suite name to group related tests together. Useful for organizing tests by feature, team, or release cycle.
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
        string|TelnyxConversationChannel|null $telnyxConversationChannel = null,
        ?string $testSuite = null,
        ?RequestOptions $requestOptions = null,
    ): AssistantTest;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $testID,
        ?RequestOptions $requestOptions = null
    ): AssistantTest;

    /**
     * @api
     *
     * @param string $description updated description of the test's purpose and evaluation criteria
     * @param string $destination updated target destination for test conversations
     * @param string $instructions updated test scenario instructions and objectives
     * @param int $maxDurationSeconds updated maximum test duration in seconds
     * @param string $name Updated name for the assistant test. Must be unique and descriptive.
     * @param list<array{
     *   criteria: string, name: string
     * }> $rubric Updated evaluation criteria for assessing assistant performance
     * @param 'phone_call'|'web_call'|'sms_chat'|'web_chat'|TelnyxConversationChannel $telnyxConversationChannel updated communication channel for the test execution
     * @param string $testSuite updated test suite assignment for better organization
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
        string|TelnyxConversationChannel|null $telnyxConversationChannel = null,
        ?string $testSuite = null,
        ?RequestOptions $requestOptions = null,
    ): AssistantTest;

    /**
     * @api
     *
     * @param string $destination Filter tests by destination (phone number, webhook URL, etc.)
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $telnyxConversationChannel Filter tests by communication channel (e.g., 'web_chat', 'sms')
     * @param string $testSuite Filter tests by test suite name
     *
     * @throws APIException
     */
    public function list(
        ?string $destination = null,
        ?array $page = null,
        ?string $telnyxConversationChannel = null,
        ?string $testSuite = null,
        ?RequestOptions $requestOptions = null,
    ): TestListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $testID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
