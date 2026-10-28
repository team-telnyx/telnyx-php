<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Mode;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Scenarios;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Runs the selected evaluator scenarios against their test agents and creates a run batch. Returns the ID of the created batch, whose results can be listed with the test-run-results endpoints.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::runScenarios()
 *
 * @phpstan-import-type ScenariosVariants from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Scenarios
 * @phpstan-import-type ScenariosShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams\Scenarios
 *
 * @phpstan-type ScenarioRunScenariosParamsShape = array{
 *   agentID?: int|null,
 *   agentNumber?: string|null,
 *   assistantID?: string|null,
 *   concurrencyLimit?: int|null,
 *   frequency?: int|null,
 *   mode?: null|Mode|value-of<Mode>,
 *   name?: string|null,
 *   outboundPhoneNumber?: string|null,
 *   personalityIDs?: list<int>|null,
 *   scenarios?: ScenariosShape|null,
 *   tags?: list<string>|null,
 *   testProfileIDs?: list<int>|null,
 * }
 */
final class ScenarioRunScenariosParams implements BaseModel
{
    /** @use SdkModel<ScenarioRunScenariosParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('agent_id')]
    public ?int $agentID;

    #[Optional('agent_number')]
    public ?string $agentNumber;

    #[Optional('assistant_id')]
    public ?string $assistantID;

    /**
     * Maximum number of concurrent simulated calls.
     */
    #[Optional('concurrency_limit')]
    public ?int $concurrencyLimit;

    #[Optional]
    public ?int $frequency;

    /** @var value-of<Mode>|null $mode */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    #[Optional]
    public ?string $name;

    #[Optional('outbound_phone_number')]
    public ?string $outboundPhoneNumber;

    /** @var list<int>|null $personalityIDs */
    #[Optional('personality_ids', list: 'int')]
    public ?array $personalityIDs;

    /**
     * Scenario IDs to run, or the literal string 'all'.
     *
     * @var ScenariosVariants|null $scenarios
     */
    #[Optional(union: Scenarios::class)]
    public string|array|null $scenarios;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    /** @var list<int>|null $testProfileIDs */
    #[Optional('test_profile_ids', list: 'int')]
    public ?array $testProfileIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Mode|value-of<Mode>|null $mode
     * @param list<int>|null $personalityIDs
     * @param ScenariosShape|null $scenarios
     * @param list<string>|null $tags
     * @param list<int>|null $testProfileIDs
     */
    public static function with(
        ?int $agentID = null,
        ?string $agentNumber = null,
        ?string $assistantID = null,
        ?int $concurrencyLimit = null,
        ?int $frequency = null,
        Mode|string|null $mode = null,
        ?string $name = null,
        ?string $outboundPhoneNumber = null,
        ?array $personalityIDs = null,
        string|array|null $scenarios = null,
        ?array $tags = null,
        ?array $testProfileIDs = null,
    ): self {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $agentNumber && $self['agentNumber'] = $agentNumber;
        null !== $assistantID && $self['assistantID'] = $assistantID;
        null !== $concurrencyLimit && $self['concurrencyLimit'] = $concurrencyLimit;
        null !== $frequency && $self['frequency'] = $frequency;
        null !== $mode && $self['mode'] = $mode;
        null !== $name && $self['name'] = $name;
        null !== $outboundPhoneNumber && $self['outboundPhoneNumber'] = $outboundPhoneNumber;
        null !== $personalityIDs && $self['personalityIDs'] = $personalityIDs;
        null !== $scenarios && $self['scenarios'] = $scenarios;
        null !== $tags && $self['tags'] = $tags;
        null !== $testProfileIDs && $self['testProfileIDs'] = $testProfileIDs;

        return $self;
    }

    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    public function withAgentNumber(string $agentNumber): self
    {
        $self = clone $this;
        $self['agentNumber'] = $agentNumber;

        return $self;
    }

    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }

    /**
     * Maximum number of concurrent simulated calls.
     */
    public function withConcurrencyLimit(int $concurrencyLimit): self
    {
        $self = clone $this;
        $self['concurrencyLimit'] = $concurrencyLimit;

        return $self;
    }

    public function withFrequency(int $frequency): self
    {
        $self = clone $this;
        $self['frequency'] = $frequency;

        return $self;
    }

    /**
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOutboundPhoneNumber(string $outboundPhoneNumber): self
    {
        $self = clone $this;
        $self['outboundPhoneNumber'] = $outboundPhoneNumber;

        return $self;
    }

    /**
     * @param list<int> $personalityIDs
     */
    public function withPersonalityIDs(array $personalityIDs): self
    {
        $self = clone $this;
        $self['personalityIDs'] = $personalityIDs;

        return $self;
    }

    /**
     * Scenario IDs to run, or the literal string 'all'.
     *
     * @param ScenariosShape $scenarios
     */
    public function withScenarios(string|array $scenarios): self
    {
        $self = clone $this;
        $self['scenarios'] = $scenarios;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * @param list<int> $testProfileIDs
     */
    public function withTestProfileIDs(array $testProfileIDs): self
    {
        $self = clone $this;
        $self['testProfileIDs'] = $testProfileIDs;

        return $self;
    }
}
