<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\AssistantTest\Rubric;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model containing complete assistant test information.
 *
 * Returns all test configuration details including evaluation criteria,
 * scheduling, and metadata. Used when retrieving individual tests or
 * after creating/updating tests.
 *
 * @phpstan-type AssistantTestShape = array{
 *   created_at: \DateTimeInterface,
 *   name: string,
 *   rubric: list<Rubric>,
 *   telnyx_conversation_channel: value-of<TelnyxConversationChannel>,
 *   test_id: string,
 *   description?: string|null,
 *   destination?: string|null,
 *   instructions?: string|null,
 *   max_duration_seconds?: int|null,
 *   test_suite?: string|null,
 * }
 */
final class AssistantTest implements BaseModel
{
    /** @use SdkModel<AssistantTestShape> */
    use SdkModel;

    /**
     * Timestamp when the test was created.
     */
    #[Required]
    public \DateTimeInterface $created_at;

    /**
     * Human-readable name of the test.
     */
    #[Required]
    public string $name;

    /**
     * Evaluation criteria used to assess test performance.
     *
     * @var list<Rubric> $rubric
     */
    #[Required(list: Rubric::class)]
    public array $rubric;

    /**
     * Communication channel used for test execution.
     *
     * @var value-of<TelnyxConversationChannel> $telnyx_conversation_channel
     */
    #[Required(enum: TelnyxConversationChannel::class)]
    public string $telnyx_conversation_channel;

    /**
     * Unique identifier for the assistant test.
     */
    #[Required]
    public string $test_id;

    /**
     * Detailed description of the test's purpose and scope.
     */
    #[Optional]
    public ?string $description;

    /**
     * Target destination for test conversations.
     */
    #[Optional]
    public ?string $destination;

    /**
     * Detailed test scenario instructions and objectives.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * Maximum allowed duration for test execution in seconds.
     */
    #[Optional]
    public ?int $max_duration_seconds;

    /**
     * Test suite grouping for organizational purposes.
     */
    #[Optional]
    public ?string $test_suite;

    /**
     * `new AssistantTest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantTest::with(
     *   created_at: ...,
     *   name: ...,
     *   rubric: ...,
     *   telnyx_conversation_channel: ...,
     *   test_id: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantTest)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withRubric(...)
     *   ->withTelnyxConversationChannel(...)
     *   ->withTestID(...)
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
     * @param list<Rubric|array{criteria: string, name: string}> $rubric
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyx_conversation_channel
     */
    public static function with(
        \DateTimeInterface $created_at,
        string $name,
        array $rubric,
        TelnyxConversationChannel|string $telnyx_conversation_channel,
        string $test_id,
        ?string $description = null,
        ?string $destination = null,
        ?string $instructions = null,
        ?int $max_duration_seconds = null,
        ?string $test_suite = null,
    ): self {
        $obj = new self;

        $obj['created_at'] = $created_at;
        $obj['name'] = $name;
        $obj['rubric'] = $rubric;
        $obj['telnyx_conversation_channel'] = $telnyx_conversation_channel;
        $obj['test_id'] = $test_id;

        null !== $description && $obj['description'] = $description;
        null !== $destination && $obj['destination'] = $destination;
        null !== $instructions && $obj['instructions'] = $instructions;
        null !== $max_duration_seconds && $obj['max_duration_seconds'] = $max_duration_seconds;
        null !== $test_suite && $obj['test_suite'] = $test_suite;

        return $obj;
    }

    /**
     * Timestamp when the test was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Human-readable name of the test.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Evaluation criteria used to assess test performance.
     *
     * @param list<Rubric|array{criteria: string, name: string}> $rubric
     */
    public function withRubric(array $rubric): self
    {
        $obj = clone $this;
        $obj['rubric'] = $rubric;

        return $obj;
    }

    /**
     * Communication channel used for test execution.
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
     * Unique identifier for the assistant test.
     */
    public function withTestID(string $testID): self
    {
        $obj = clone $this;
        $obj['test_id'] = $testID;

        return $obj;
    }

    /**
     * Detailed description of the test's purpose and scope.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Target destination for test conversations.
     */
    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj['destination'] = $destination;

        return $obj;
    }

    /**
     * Detailed test scenario instructions and objectives.
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    /**
     * Maximum allowed duration for test execution in seconds.
     */
    public function withMaxDurationSeconds(int $maxDurationSeconds): self
    {
        $obj = clone $this;
        $obj['max_duration_seconds'] = $maxDurationSeconds;

        return $obj;
    }

    /**
     * Test suite grouping for organizational purposes.
     */
    public function withTestSuite(string $testSuite): self
    {
        $obj = clone $this;
        $obj['test_suite'] = $testSuite;

        return $obj;
    }
}
