<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGenerateBgParams\ScenarioType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Starts background generation of evaluator scenarios for a test agent. Returns a progress ID to poll with the generate-scenarios-progress endpoint.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::generateBg()
 *
 * @phpstan-type ScenarioGenerateBgParamsShape = array{
 *   numScenarios: int,
 *   agentID?: int|null,
 *   extraInstructions?: string|null,
 *   firstMessage?: string|null,
 *   folderPath?: string|null,
 *   generateExpectedOutcomes?: bool|null,
 *   inboundPhoneNumber?: int|null,
 *   personalities?: list<int>|null,
 *   scenarioType?: null|ScenarioType|value-of<ScenarioType>,
 *   tags?: list<string>|null,
 *   testProfile?: int|null,
 *   toolIDs?: list<string>|null,
 * }
 */
final class ScenarioGenerateBgParams implements BaseModel
{
    /** @use SdkModel<ScenarioGenerateBgParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * How many scenarios to generate.
     */
    #[Required('num_scenarios')]
    public int $numScenarios;

    #[Optional('agent_id')]
    public ?int $agentID;

    /**
     * Optional guidance steering scenario generation.
     */
    #[Optional('extra_instructions')]
    public ?string $extraInstructions;

    #[Optional('first_message')]
    public ?string $firstMessage;

    #[Optional('folder_path', nullable: true)]
    public ?string $folderPath;

    /**
     * Whether to generate expected-outcome prompts for the scenarios.
     */
    #[Optional('generate_expected_outcomes')]
    public ?bool $generateExpectedOutcomes;

    #[Optional('inbound_phone_number', nullable: true)]
    public ?int $inboundPhoneNumber;

    /** @var list<int>|null $personalities */
    #[Optional(list: 'int')]
    public ?array $personalities;

    /**
     * Type of scenario to generate.
     *
     * @var value-of<ScenarioType>|null $scenarioType
     */
    #[Optional('scenario_type', enum: ScenarioType::class)]
    public ?string $scenarioType;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('test_profile')]
    public ?int $testProfile;

    /** @var list<string>|null $toolIDs */
    #[Optional('tool_ids', list: 'string')]
    public ?array $toolIDs;

    /**
     * `new ScenarioGenerateBgParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioGenerateBgParams::with(numScenarios: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioGenerateBgParams)->withNumScenarios(...)
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
     * @param list<int>|null $personalities
     * @param ScenarioType|value-of<ScenarioType>|null $scenarioType
     * @param list<string>|null $tags
     * @param list<string>|null $toolIDs
     */
    public static function with(
        int $numScenarios,
        string|Omitted|null $folderPath = Omitted::VALUE,
        int|Omitted|null $inboundPhoneNumber = Omitted::VALUE,
        ?int $agentID = null,
        ?string $extraInstructions = null,
        ?string $firstMessage = null,
        ?bool $generateExpectedOutcomes = null,
        ?array $personalities = null,
        ScenarioType|string|null $scenarioType = null,
        ?array $tags = null,
        ?int $testProfile = null,
        ?array $toolIDs = null,
    ): self {
        $self = new self;

        $self['numScenarios'] = $numScenarios;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $extraInstructions && $self['extraInstructions'] = $extraInstructions;
        null !== $firstMessage && $self['firstMessage'] = $firstMessage;
        Omitted::VALUE !== $folderPath && $self['folderPath'] = $folderPath;
        null !== $generateExpectedOutcomes && $self['generateExpectedOutcomes'] = $generateExpectedOutcomes;
        Omitted::VALUE !== $inboundPhoneNumber && $self['inboundPhoneNumber'] = $inboundPhoneNumber;
        null !== $personalities && $self['personalities'] = $personalities;
        null !== $scenarioType && $self['scenarioType'] = $scenarioType;
        null !== $tags && $self['tags'] = $tags;
        null !== $testProfile && $self['testProfile'] = $testProfile;
        null !== $toolIDs && $self['toolIDs'] = $toolIDs;

        return $self;
    }

    /**
     * How many scenarios to generate.
     */
    public function withNumScenarios(int $numScenarios): self
    {
        $self = clone $this;
        $self['numScenarios'] = $numScenarios;

        return $self;
    }

    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * Optional guidance steering scenario generation.
     */
    public function withExtraInstructions(string $extraInstructions): self
    {
        $self = clone $this;
        $self['extraInstructions'] = $extraInstructions;

        return $self;
    }

    public function withFirstMessage(string $firstMessage): self
    {
        $self = clone $this;
        $self['firstMessage'] = $firstMessage;

        return $self;
    }

    public function withFolderPath(?string $folderPath): self
    {
        $self = clone $this;
        $self['folderPath'] = $folderPath;

        return $self;
    }

    /**
     * Whether to generate expected-outcome prompts for the scenarios.
     */
    public function withGenerateExpectedOutcomes(
        bool $generateExpectedOutcomes
    ): self {
        $self = clone $this;
        $self['generateExpectedOutcomes'] = $generateExpectedOutcomes;

        return $self;
    }

    public function withInboundPhoneNumber(?int $inboundPhoneNumber): self
    {
        $self = clone $this;
        $self['inboundPhoneNumber'] = $inboundPhoneNumber;

        return $self;
    }

    /**
     * @param list<int> $personalities
     */
    public function withPersonalities(array $personalities): self
    {
        $self = clone $this;
        $self['personalities'] = $personalities;

        return $self;
    }

    /**
     * Type of scenario to generate.
     *
     * @param ScenarioType|value-of<ScenarioType> $scenarioType
     */
    public function withScenarioType(ScenarioType|string $scenarioType): self
    {
        $self = clone $this;
        $self['scenarioType'] = $scenarioType;

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

    public function withTestProfile(int $testProfile): self
    {
        $self = clone $this;
        $self['testProfile'] = $testProfile;

        return $self;
    }

    /**
     * @param list<string> $toolIDs
     */
    public function withToolIDs(array $toolIDs): self
    {
        $self = clone $this;
        $self['toolIDs'] = $toolIDs;

        return $self;
    }
}
