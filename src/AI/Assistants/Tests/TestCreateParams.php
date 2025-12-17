<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a comprehensive test configuration for evaluating AI assistant performance.
 *
 * @see Telnyx\Services\AI\Assistants\TestsService::create()
 *
 * @phpstan-import-type RubricShape from \Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric
 *
 * @phpstan-type TestCreateParamsShape = array{
 *   destination: string,
 *   instructions: string,
 *   name: string,
 *   rubric: list<RubricShape>,
 *   description?: string|null,
 *   maxDurationSeconds?: int|null,
 *   telnyxConversationChannel?: null|TelnyxConversationChannel|value-of<TelnyxConversationChannel>,
 *   testSuite?: string|null,
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
    #[Required]
    public string $destination;

    /**
     * Detailed instructions that define the test scenario and what the assistant should accomplish. This guides the test execution and evaluation.
     */
    #[Required]
    public string $instructions;

    /**
     * A descriptive name for the assistant test. This will be used to identify the test in the UI and reports.
     */
    #[Required]
    public string $name;

    /**
     * Evaluation criteria used to assess the assistant's performance. Each rubric item contains a name and specific criteria for evaluation.
     *
     * @var list<Rubric> $rubric
     */
    #[Required(list: Rubric::class)]
    public array $rubric;

    /**
     * Optional detailed description of what this test evaluates and its purpose. Helps team members understand the test's objectives.
     */
    #[Optional]
    public ?string $description;

    /**
     * Maximum duration in seconds that the test conversation should run before timing out. If not specified, uses system default timeout.
     */
    #[Optional('max_duration_seconds')]
    public ?int $maxDurationSeconds;

    /**
     * The communication channel through which the test will be conducted. Determines how the assistant will receive and respond to test messages.
     *
     * @var value-of<TelnyxConversationChannel>|null $telnyxConversationChannel
     */
    #[Optional(
        'telnyx_conversation_channel',
        enum: TelnyxConversationChannel::class
    )]
    public ?string $telnyxConversationChannel;

    /**
     * Optional test suite name to group related tests together. Useful for organizing tests by feature, team, or release cycle.
     */
    #[Optional('test_suite')]
    public ?string $testSuite;

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
     * @param list<RubricShape> $rubric
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel>|null $telnyxConversationChannel
     */
    public static function with(
        string $destination,
        string $instructions,
        string $name,
        array $rubric,
        ?string $description = null,
        ?int $maxDurationSeconds = null,
        TelnyxConversationChannel|string|null $telnyxConversationChannel = null,
        ?string $testSuite = null,
    ): self {
        $self = new self;

        $self['destination'] = $destination;
        $self['instructions'] = $instructions;
        $self['name'] = $name;
        $self['rubric'] = $rubric;

        null !== $description && $self['description'] = $description;
        null !== $maxDurationSeconds && $self['maxDurationSeconds'] = $maxDurationSeconds;
        null !== $telnyxConversationChannel && $self['telnyxConversationChannel'] = $telnyxConversationChannel;
        null !== $testSuite && $self['testSuite'] = $testSuite;

        return $self;
    }

    /**
     * The target destination for the test conversation. Format depends on the channel: phone number for SMS/voice, webhook URL for web chat, etc.
     */
    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    /**
     * Detailed instructions that define the test scenario and what the assistant should accomplish. This guides the test execution and evaluation.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * A descriptive name for the assistant test. This will be used to identify the test in the UI and reports.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Evaluation criteria used to assess the assistant's performance. Each rubric item contains a name and specific criteria for evaluation.
     *
     * @param list<RubricShape> $rubric
     */
    public function withRubric(array $rubric): self
    {
        $self = clone $this;
        $self['rubric'] = $rubric;

        return $self;
    }

    /**
     * Optional detailed description of what this test evaluates and its purpose. Helps team members understand the test's objectives.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Maximum duration in seconds that the test conversation should run before timing out. If not specified, uses system default timeout.
     */
    public function withMaxDurationSeconds(int $maxDurationSeconds): self
    {
        $self = clone $this;
        $self['maxDurationSeconds'] = $maxDurationSeconds;

        return $self;
    }

    /**
     * The communication channel through which the test will be conducted. Determines how the assistant will receive and respond to test messages.
     *
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel
     */
    public function withTelnyxConversationChannel(
        TelnyxConversationChannel|string $telnyxConversationChannel
    ): self {
        $self = clone $this;
        $self['telnyxConversationChannel'] = $telnyxConversationChannel;

        return $self;
    }

    /**
     * Optional test suite name to group related tests together. Useful for organizing tests by feature, team, or release cycle.
     */
    public function withTestSuite(string $testSuite): self
    {
        $self = clone $this;
        $self['testSuite'] = $testSuite;

        return $self;
    }
}
