<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestUpdateParams\Rubric;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates an existing assistant test configuration with new settings.
 *
 * @see Telnyx\Services\AI\Assistants\TestsService::update()
 *
 * @phpstan-import-type RubricShape from \Telnyx\AI\Assistants\Tests\TestUpdateParams\Rubric
 *
 * @phpstan-type TestUpdateParamsShape = array{
 *   description?: string|null,
 *   destination?: string|null,
 *   instructions?: string|null,
 *   maxDurationSeconds?: int|null,
 *   name?: string|null,
 *   rubric?: list<RubricShape>|null,
 *   telnyxConversationChannel?: null|TelnyxConversationChannel|value-of<TelnyxConversationChannel>,
 *   testSuite?: string|null,
 * }
 */
final class TestUpdateParams implements BaseModel
{
    /** @use SdkModel<TestUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Updated description of the test's purpose and evaluation criteria.
     */
    #[Optional]
    public ?string $description;

    /**
     * Updated target destination for test conversations.
     */
    #[Optional]
    public ?string $destination;

    /**
     * Updated test scenario instructions and objectives.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * Updated maximum test duration in seconds.
     */
    #[Optional('max_duration_seconds')]
    public ?int $maxDurationSeconds;

    /**
     * Updated name for the assistant test. Must be unique and descriptive.
     */
    #[Optional]
    public ?string $name;

    /**
     * Updated evaluation criteria for assessing assistant performance.
     *
     * @var list<Rubric>|null $rubric
     */
    #[Optional(list: Rubric::class)]
    public ?array $rubric;

    /**
     * Updated communication channel for the test execution.
     *
     * @var value-of<TelnyxConversationChannel>|null $telnyxConversationChannel
     */
    #[Optional(
        'telnyx_conversation_channel',
        enum: TelnyxConversationChannel::class
    )]
    public ?string $telnyxConversationChannel;

    /**
     * Updated test suite assignment for better organization.
     */
    #[Optional('test_suite')]
    public ?string $testSuite;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RubricShape>|null $rubric
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel>|null $telnyxConversationChannel
     */
    public static function with(
        ?string $description = null,
        ?string $destination = null,
        ?string $instructions = null,
        ?int $maxDurationSeconds = null,
        ?string $name = null,
        ?array $rubric = null,
        TelnyxConversationChannel|string|null $telnyxConversationChannel = null,
        ?string $testSuite = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $destination && $self['destination'] = $destination;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $maxDurationSeconds && $self['maxDurationSeconds'] = $maxDurationSeconds;
        null !== $name && $self['name'] = $name;
        null !== $rubric && $self['rubric'] = $rubric;
        null !== $telnyxConversationChannel && $self['telnyxConversationChannel'] = $telnyxConversationChannel;
        null !== $testSuite && $self['testSuite'] = $testSuite;

        return $self;
    }

    /**
     * Updated description of the test's purpose and evaluation criteria.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Updated target destination for test conversations.
     */
    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    /**
     * Updated test scenario instructions and objectives.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Updated maximum test duration in seconds.
     */
    public function withMaxDurationSeconds(int $maxDurationSeconds): self
    {
        $self = clone $this;
        $self['maxDurationSeconds'] = $maxDurationSeconds;

        return $self;
    }

    /**
     * Updated name for the assistant test. Must be unique and descriptive.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Updated evaluation criteria for assessing assistant performance.
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
     * Updated communication channel for the test execution.
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
     * Updated test suite assignment for better organization.
     */
    public function withTestSuite(string $testSuite): self
    {
        $self = clone $this;
        $self['testSuite'] = $testSuite;

        return $self;
    }
}
