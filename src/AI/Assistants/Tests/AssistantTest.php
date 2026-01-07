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
 * @phpstan-import-type RubricShape from \Telnyx\AI\Assistants\Tests\AssistantTest\Rubric
 *
 * @phpstan-type AssistantTestShape = array{
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   rubric: list<Rubric|RubricShape>,
 *   telnyxConversationChannel: TelnyxConversationChannel|value-of<TelnyxConversationChannel>,
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
     * @param list<Rubric|RubricShape> $rubric
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
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['rubric'] = $rubric;
        $self['telnyxConversationChannel'] = $telnyxConversationChannel;
        $self['testID'] = $testID;

        null !== $description && $self['description'] = $description;
        null !== $destination && $self['destination'] = $destination;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $maxDurationSeconds && $self['maxDurationSeconds'] = $maxDurationSeconds;
        null !== $testSuite && $self['testSuite'] = $testSuite;

        return $self;
    }

    /**
     * Timestamp when the test was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Human-readable name of the test.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Evaluation criteria used to assess test performance.
     *
     * @param list<Rubric|RubricShape> $rubric
     */
    public function withRubric(array $rubric): self
    {
        $self = clone $this;
        $self['rubric'] = $rubric;

        return $self;
    }

    /**
     * Communication channel used for test execution.
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
     * Unique identifier for the assistant test.
     */
    public function withTestID(string $testID): self
    {
        $self = clone $this;
        $self['testID'] = $testID;

        return $self;
    }

    /**
     * Detailed description of the test's purpose and scope.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Target destination for test conversations.
     */
    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    /**
     * Detailed test scenario instructions and objectives.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Maximum allowed duration for test execution in seconds.
     */
    public function withMaxDurationSeconds(int $maxDurationSeconds): self
    {
        $self = clone $this;
        $self['maxDurationSeconds'] = $maxDurationSeconds;

        return $self;
    }

    /**
     * Test suite grouping for organizational purposes.
     */
    public function withTestSuite(string $testSuite): self
    {
        $self = clone $this;
        $self['testSuite'] = $testSuite;

        return $self;
    }
}
