<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a comprehensive test configuration for evaluating AI assistant performance.
 *
 * @see Telnyx\Services\AI\Assistants\TestsService::create()
 *
 * @phpstan-type TestCreateParamsShape = array{
 *   destination: string,
 *   instructions: string,
 *   name: string,
 *   rubric: list<Rubric>,
 *   description?: string,
 *   max_duration_seconds?: int,
 *   telnyx_conversation_channel?: TelnyxConversationChannel|value-of<TelnyxConversationChannel>,
 *   test_suite?: string,
 * }
 */
final class TestCreateParams implements BaseModel
{
    /** @use SdkModel<TestCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The target destination for the test conversation. Format depends on the channel: phone number for SMS/voice, webhook URL for web chat, etc.
     */
    #[Api]
    public string $destination;

    /**
     * Detailed instructions that define the test scenario and what the assistant should accomplish. This guides the test execution and evaluation.
     */
    #[Api]
    public string $instructions;

    /**
     * A descriptive name for the assistant test. This will be used to identify the test in the UI and reports.
     */
    #[Api]
    public string $name;

    /**
     * Evaluation criteria used to assess the assistant's performance. Each rubric item contains a name and specific criteria for evaluation.
     *
     * @var list<Rubric> $rubric
     */
    #[Api(list: Rubric::class)]
    public array $rubric;

    /**
     * Optional detailed description of what this test evaluates and its purpose. Helps team members understand the test's objectives.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Maximum duration in seconds that the test conversation should run before timing out. If not specified, uses system default timeout.
     */
    #[Api(optional: true)]
    public ?int $max_duration_seconds;

    /**
     * The communication channel through which the test will be conducted. Determines how the assistant will receive and respond to test messages.
     *
     * @var value-of<TelnyxConversationChannel>|null $telnyx_conversation_channel
     */
    #[Api(enum: TelnyxConversationChannel::class, optional: true)]
    public ?string $telnyx_conversation_channel;

    /**
     * Optional test suite name to group related tests together. Useful for organizing tests by feature, team, or release cycle.
     */
    #[Api(optional: true)]
    public ?string $test_suite;

    /**
     * `new TestCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestCreateParams::with(
     *   destination: ..., instructions: ..., name: ..., rubric: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestCreateParams)
     *   ->withDestination(...)
     *   ->withInstructions(...)
     *   ->withName(...)
     *   ->withRubric(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Rubric> $rubric
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyx_conversation_channel
     */
    public static function with(
        string $destination,
        string $instructions,
        string $name,
        array $rubric,
        ?string $description = null,
        ?int $max_duration_seconds = null,
        TelnyxConversationChannel|string|null $telnyx_conversation_channel = null,
        ?string $test_suite = null,
    ): self {
        $obj = new self;

        $obj->destination = $destination;
        $obj->instructions = $instructions;
        $obj->name = $name;
        $obj->rubric = $rubric;

        null !== $description && $obj->description = $description;
        null !== $max_duration_seconds && $obj->max_duration_seconds = $max_duration_seconds;
        null !== $telnyx_conversation_channel && $obj['telnyx_conversation_channel'] = $telnyx_conversation_channel;
        null !== $test_suite && $obj->test_suite = $test_suite;

        return $obj;
    }

    /**
     * The target destination for the test conversation. Format depends on the channel: phone number for SMS/voice, webhook URL for web chat, etc.
     */
    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    /**
     * Detailed instructions that define the test scenario and what the assistant should accomplish. This guides the test execution and evaluation.
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj->instructions = $instructions;

        return $obj;
    }

    /**
     * A descriptive name for the assistant test. This will be used to identify the test in the UI and reports.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Evaluation criteria used to assess the assistant's performance. Each rubric item contains a name and specific criteria for evaluation.
     *
     * @param list<Rubric> $rubric
     */
    public function withRubric(array $rubric): self
    {
        $obj = clone $this;
        $obj->rubric = $rubric;

        return $obj;
    }

    /**
     * Optional detailed description of what this test evaluates and its purpose. Helps team members understand the test's objectives.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Maximum duration in seconds that the test conversation should run before timing out. If not specified, uses system default timeout.
     */
    public function withMaxDurationSeconds(int $maxDurationSeconds): self
    {
        $obj = clone $this;
        $obj->max_duration_seconds = $maxDurationSeconds;

        return $obj;
    }

    /**
     * The communication channel through which the test will be conducted. Determines how the assistant will receive and respond to test messages.
     *
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel
     */
    public function withTelnyxConversationChannel(
        TelnyxConversationChannel|string $telnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj['telnyx_conversation_channel'] = $telnyxConversationChannel;

        return $obj;
    }

    /**
     * Optional test suite name to group related tests together. Useful for organizing tests by feature, team, or release cycle.
     */
    public function withTestSuite(string $testSuite): self
    {
        $obj = clone $this;
        $obj->test_suite = $testSuite;

        return $obj;
    }
}
