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
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   rubric: list<Rubric>,
 *   telnyxConversationChannel: value-of<TelnyxConversationChannel>,
 *   testID: string,
 *   description?: string|null,
 *   destination?: string|null,
 *   instructions?: string|null,
 *   maxDurationSeconds?: int|null,
 *   testSuite?: string|null,
 * }
 */
final class AssistantTest implements BaseModel
{
    /** @use SdkModel<AssistantTestShape> */
    use SdkModel;

    /**
     * Timestamp when the test was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

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
     * @var value-of<TelnyxConversationChannel> $telnyxConversationChannel
     */
    #[Required(
        'telnyx_conversation_channel',
        enum: TelnyxConversationChannel::class
    )]
    public string $telnyxConversationChannel;

    /**
     * Unique identifier for the assistant test.
     */
    #[Required('test_id')]
    public string $testID;

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
    #[Optional('max_duration_seconds')]
    public ?int $maxDurationSeconds;

    /**
     * Test suite grouping for organizational purposes.
     */
    #[Optional('test_suite')]
    public ?string $testSuite;

    /**
     * `new AssistantTest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantTest::with(
     *   createdAt: ...,
     *   name: ...,
     *   rubric: ...,
     *   telnyxConversationChannel: ...,
     *   testID: ...,
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
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel
     */
    public static function with(
        \DateTimeInterface $createdAt,
        string $name,
        array $rubric,
        TelnyxConversationChannel|string $telnyxConversationChannel,
        string $testID,
        ?string $description = null,
        ?string $destination = null,
        ?string $instructions = null,
        ?int $maxDurationSeconds = null,
        ?string $testSuite = null,
    ): self {
        $obj = new self;

        $obj['createdAt'] = $createdAt;
        $obj['name'] = $name;
        $obj['rubric'] = $rubric;
        $obj['telnyxConversationChannel'] = $telnyxConversationChannel;
        $obj['testID'] = $testID;

        null !== $description && $obj['description'] = $description;
        null !== $destination && $obj['destination'] = $destination;
        null !== $instructions && $obj['instructions'] = $instructions;
        null !== $maxDurationSeconds && $obj['maxDurationSeconds'] = $maxDurationSeconds;
        null !== $testSuite && $obj['testSuite'] = $testSuite;

        return $obj;
    }

    /**
     * Timestamp when the test was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['telnyxConversationChannel'] = $telnyxConversationChannel;

        return $obj;
    }

    /**
     * Unique identifier for the assistant test.
     */
    public function withTestID(string $testID): self
    {
        $obj = clone $this;
        $obj['testID'] = $testID;

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
        $obj['maxDurationSeconds'] = $maxDurationSeconds;

        return $obj;
    }

    /**
     * Test suite grouping for organizational purposes.
     */
    public function withTestSuite(string $testSuite): self
    {
        $obj = clone $this;
        $obj['testSuite'] = $testSuite;

        return $obj;
    }
}
