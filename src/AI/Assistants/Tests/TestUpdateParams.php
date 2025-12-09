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
 * @phpstan-type TestUpdateParamsShape = array{
 *   description?: string,
 *   destination?: string,
 *   instructions?: string,
 *   maxDurationSeconds?: int,
 *   name?: string,
 *   rubric?: list<Rubric|array{criteria: string, name: string}>,
 *   telnyxConversationChannel?: TelnyxConversationChannel|value-of<TelnyxConversationChannel>,
 *   testSuite?: string,
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
     * @param list<Rubric|array{criteria: string, name: string}> $rubric
     * @param TelnyxConversationChannel|value-of<TelnyxConversationChannel> $telnyxConversationChannel
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
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $destination && $obj['destination'] = $destination;
        null !== $instructions && $obj['instructions'] = $instructions;
        null !== $maxDurationSeconds && $obj['maxDurationSeconds'] = $maxDurationSeconds;
        null !== $name && $obj['name'] = $name;
        null !== $rubric && $obj['rubric'] = $rubric;
        null !== $telnyxConversationChannel && $obj['telnyxConversationChannel'] = $telnyxConversationChannel;
        null !== $testSuite && $obj['testSuite'] = $testSuite;

        return $obj;
    }

    /**
     * Updated description of the test's purpose and evaluation criteria.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Updated target destination for test conversations.
     */
    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj['destination'] = $destination;

        return $obj;
    }

    /**
     * Updated test scenario instructions and objectives.
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    /**
     * Updated maximum test duration in seconds.
     */
    public function withMaxDurationSeconds(int $maxDurationSeconds): self
    {
        $obj = clone $this;
        $obj['maxDurationSeconds'] = $maxDurationSeconds;

        return $obj;
    }

    /**
     * Updated name for the assistant test. Must be unique and descriptive.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Updated evaluation criteria for assessing assistant performance.
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
     * Updated communication channel for the test execution.
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
     * Updated test suite assignment for better organization.
     */
    public function withTestSuite(string $testSuite): self
    {
        $obj = clone $this;
        $obj['testSuite'] = $testSuite;

        return $obj;
    }
}
