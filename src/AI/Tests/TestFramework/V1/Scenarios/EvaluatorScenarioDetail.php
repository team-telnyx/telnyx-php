<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail\InboundPhoneNumberData;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail\OutboundPhoneNumberData;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail\TestProfileData;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type InboundPhoneNumberDataShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail\InboundPhoneNumberData
 * @phpstan-import-type OutboundPhoneNumberDataShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail\OutboundPhoneNumberData
 * @phpstan-import-type TestProfileDataShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail\TestProfileData
 *
 * @phpstan-type EvaluatorScenarioDetailShape = array{
 *   id: int,
 *   agent: int|null,
 *   name: string,
 *   dynamicVariableValues?: array<string,string>|null,
 *   expectedOutcomePrompt?: string|null,
 *   firstMessage?: string|null,
 *   folderPath?: string|null,
 *   inboundPhoneNumber?: int|null,
 *   inboundPhoneNumberData?: null|InboundPhoneNumberData|InboundPhoneNumberDataShape,
 *   informationFields?: array<string,string>|null,
 *   instructions?: string|null,
 *   isPredefined?: bool|null,
 *   maxDuration?: int|null,
 *   metricNames?: list<string>|null,
 *   metrics?: list<int>|null,
 *   outboundPhoneNumberData?: null|OutboundPhoneNumberData|OutboundPhoneNumberDataShape,
 *   personality?: int|null,
 *   personalityName?: string|null,
 *   phoneNumber?: string|null,
 *   project?: int|null,
 *   runs?: list<int>|null,
 *   scenarioLanguage?: string|null,
 *   scenarioType?: string|null,
 *   simulationDescription?: string|null,
 *   suiteType?: string|null,
 *   tags?: list<string>|null,
 *   testProfile?: int|null,
 *   testProfileData?: null|TestProfileData|TestProfileDataShape,
 *   toolIDs?: list<string>|null,
 * }
 */
final class EvaluatorScenarioDetail implements BaseModel
{
    /** @use SdkModel<EvaluatorScenarioDetailShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public ?int $agent;

    #[Required]
    public string $name;

    /** @var array<string,string>|null $dynamicVariableValues */
    #[Optional('dynamic_variable_values', map: 'string', nullable: true)]
    public ?array $dynamicVariableValues;

    #[Optional('expected_outcome_prompt')]
    public ?string $expectedOutcomePrompt;

    #[Optional('first_message')]
    public ?string $firstMessage;

    #[Optional('folder_path', nullable: true)]
    public ?string $folderPath;

    #[Optional('inbound_phone_number', nullable: true)]
    public ?int $inboundPhoneNumber;

    #[Optional('inbound_phone_number_data', nullable: true)]
    public ?InboundPhoneNumberData $inboundPhoneNumberData;

    /** @var array<string,string>|null $informationFields */
    #[Optional('information_fields', map: 'string', nullable: true)]
    public ?array $informationFields;

    #[Optional]
    public ?string $instructions;

    #[Optional('is_predefined')]
    public ?bool $isPredefined;

    #[Optional('max_duration', nullable: true)]
    public ?int $maxDuration;

    /** @var list<string>|null $metricNames */
    #[Optional('metric_names', list: 'string')]
    public ?array $metricNames;

    /** @var list<int>|null $metrics */
    #[Optional(list: 'int')]
    public ?array $metrics;

    #[Optional('outbound_phone_number_data', nullable: true)]
    public ?OutboundPhoneNumberData $outboundPhoneNumberData;

    #[Optional(nullable: true)]
    public ?int $personality;

    #[Optional('personality_name')]
    public ?string $personalityName;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional(nullable: true)]
    public ?int $project;

    /** @var list<int>|null $runs */
    #[Optional(list: 'int')]
    public ?array $runs;

    #[Optional('scenario_language', nullable: true)]
    public ?string $scenarioLanguage;

    #[Optional('scenario_type')]
    public ?string $scenarioType;

    #[Optional('simulation_description')]
    public ?string $simulationDescription;

    #[Optional('suite_type')]
    public ?string $suiteType;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('test_profile', nullable: true)]
    public ?int $testProfile;

    #[Optional('test_profile_data', nullable: true)]
    public ?TestProfileData $testProfileData;

    /** @var list<string>|null $toolIDs */
    #[Optional('tool_ids', list: 'string')]
    public ?array $toolIDs;

    /**
     * `new EvaluatorScenarioDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EvaluatorScenarioDetail::with(id: ..., agent: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EvaluatorScenarioDetail)->withID(...)->withAgent(...)->withName(...)
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
     * @param Omitted|array<string,string>|null $dynamicVariableValues
     * @param Omitted|InboundPhoneNumberData|InboundPhoneNumberDataShape|null $inboundPhoneNumberData
     * @param Omitted|array<string,string>|null $informationFields
     * @param Omitted|OutboundPhoneNumberData|OutboundPhoneNumberDataShape|null $outboundPhoneNumberData
     * @param Omitted|TestProfileData|TestProfileDataShape|null $testProfileData
     * @param list<string>|null $metricNames
     * @param list<int>|null $metrics
     * @param list<int>|null $runs
     * @param list<string>|null $tags
     * @param list<string>|null $toolIDs
     */
    public static function with(
        int $id,
        ?int $agent,
        string $name,
        Omitted|array|null $dynamicVariableValues = Omitted::VALUE,
        string|Omitted|null $folderPath = Omitted::VALUE,
        int|Omitted|null $inboundPhoneNumber = Omitted::VALUE,
        Omitted|InboundPhoneNumberData|array|null $inboundPhoneNumberData = Omitted::VALUE,
        Omitted|array|null $informationFields = Omitted::VALUE,
        int|Omitted|null $maxDuration = Omitted::VALUE,
        Omitted|OutboundPhoneNumberData|array|null $outboundPhoneNumberData = Omitted::VALUE,
        int|Omitted|null $personality = Omitted::VALUE,
        int|Omitted|null $project = Omitted::VALUE,
        string|Omitted|null $scenarioLanguage = Omitted::VALUE,
        int|Omitted|null $testProfile = Omitted::VALUE,
        Omitted|TestProfileData|array|null $testProfileData = Omitted::VALUE,
        ?string $expectedOutcomePrompt = null,
        ?string $firstMessage = null,
        ?string $instructions = null,
        ?bool $isPredefined = null,
        ?array $metricNames = null,
        ?array $metrics = null,
        ?string $personalityName = null,
        ?string $phoneNumber = null,
        ?array $runs = null,
        ?string $scenarioType = null,
        ?string $simulationDescription = null,
        ?string $suiteType = null,
        ?array $tags = null,
        ?array $toolIDs = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['agent'] = $agent;
        $self['name'] = $name;

        Omitted::VALUE !== $dynamicVariableValues && $self['dynamicVariableValues'] = $dynamicVariableValues;
        null !== $expectedOutcomePrompt && $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;
        null !== $firstMessage && $self['firstMessage'] = $firstMessage;
        Omitted::VALUE !== $folderPath && $self['folderPath'] = $folderPath;
        Omitted::VALUE !== $inboundPhoneNumber && $self['inboundPhoneNumber'] = $inboundPhoneNumber;
        Omitted::VALUE !== $inboundPhoneNumberData && $self['inboundPhoneNumberData'] = $inboundPhoneNumberData;
        Omitted::VALUE !== $informationFields && $self['informationFields'] = $informationFields;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $isPredefined && $self['isPredefined'] = $isPredefined;
        Omitted::VALUE !== $maxDuration && $self['maxDuration'] = $maxDuration;
        null !== $metricNames && $self['metricNames'] = $metricNames;
        null !== $metrics && $self['metrics'] = $metrics;
        Omitted::VALUE !== $outboundPhoneNumberData && $self['outboundPhoneNumberData'] = $outboundPhoneNumberData;
        Omitted::VALUE !== $personality && $self['personality'] = $personality;
        null !== $personalityName && $self['personalityName'] = $personalityName;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        Omitted::VALUE !== $project && $self['project'] = $project;
        null !== $runs && $self['runs'] = $runs;
        Omitted::VALUE !== $scenarioLanguage && $self['scenarioLanguage'] = $scenarioLanguage;
        null !== $scenarioType && $self['scenarioType'] = $scenarioType;
        null !== $simulationDescription && $self['simulationDescription'] = $simulationDescription;
        null !== $suiteType && $self['suiteType'] = $suiteType;
        null !== $tags && $self['tags'] = $tags;
        Omitted::VALUE !== $testProfile && $self['testProfile'] = $testProfile;
        Omitted::VALUE !== $testProfileData && $self['testProfileData'] = $testProfileData;
        null !== $toolIDs && $self['toolIDs'] = $toolIDs;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAgent(?int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param array<string,string>|null $dynamicVariableValues
     */
    public function withDynamicVariableValues(
        ?array $dynamicVariableValues
    ): self {
        $self = clone $this;
        $self['dynamicVariableValues'] = $dynamicVariableValues;

        return $self;
    }

    public function withExpectedOutcomePrompt(
        string $expectedOutcomePrompt
    ): self {
        $self = clone $this;
        $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;

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

    public function withInboundPhoneNumber(?int $inboundPhoneNumber): self
    {
        $self = clone $this;
        $self['inboundPhoneNumber'] = $inboundPhoneNumber;

        return $self;
    }

    /**
     * @param InboundPhoneNumberData|InboundPhoneNumberDataShape|null $inboundPhoneNumberData
     */
    public function withInboundPhoneNumberData(
        InboundPhoneNumberData|array|null $inboundPhoneNumberData
    ): self {
        $self = clone $this;
        $self['inboundPhoneNumberData'] = $inboundPhoneNumberData;

        return $self;
    }

    /**
     * @param array<string,string>|null $informationFields
     */
    public function withInformationFields(?array $informationFields): self
    {
        $self = clone $this;
        $self['informationFields'] = $informationFields;

        return $self;
    }

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    public function withIsPredefined(bool $isPredefined): self
    {
        $self = clone $this;
        $self['isPredefined'] = $isPredefined;

        return $self;
    }

    public function withMaxDuration(?int $maxDuration): self
    {
        $self = clone $this;
        $self['maxDuration'] = $maxDuration;

        return $self;
    }

    /**
     * @param list<string> $metricNames
     */
    public function withMetricNames(array $metricNames): self
    {
        $self = clone $this;
        $self['metricNames'] = $metricNames;

        return $self;
    }

    /**
     * @param list<int> $metrics
     */
    public function withMetrics(array $metrics): self
    {
        $self = clone $this;
        $self['metrics'] = $metrics;

        return $self;
    }

    /**
     * @param OutboundPhoneNumberData|OutboundPhoneNumberDataShape|null $outboundPhoneNumberData
     */
    public function withOutboundPhoneNumberData(
        OutboundPhoneNumberData|array|null $outboundPhoneNumberData
    ): self {
        $self = clone $this;
        $self['outboundPhoneNumberData'] = $outboundPhoneNumberData;

        return $self;
    }

    public function withPersonality(?int $personality): self
    {
        $self = clone $this;
        $self['personality'] = $personality;

        return $self;
    }

    public function withPersonalityName(string $personalityName): self
    {
        $self = clone $this;
        $self['personalityName'] = $personalityName;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withProject(?int $project): self
    {
        $self = clone $this;
        $self['project'] = $project;

        return $self;
    }

    /**
     * @param list<int> $runs
     */
    public function withRuns(array $runs): self
    {
        $self = clone $this;
        $self['runs'] = $runs;

        return $self;
    }

    public function withScenarioLanguage(?string $scenarioLanguage): self
    {
        $self = clone $this;
        $self['scenarioLanguage'] = $scenarioLanguage;

        return $self;
    }

    public function withScenarioType(string $scenarioType): self
    {
        $self = clone $this;
        $self['scenarioType'] = $scenarioType;

        return $self;
    }

    public function withSimulationDescription(
        string $simulationDescription
    ): self {
        $self = clone $this;
        $self['simulationDescription'] = $simulationDescription;

        return $self;
    }

    public function withSuiteType(string $suiteType): self
    {
        $self = clone $this;
        $self['suiteType'] = $suiteType;

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

    public function withTestProfile(?int $testProfile): self
    {
        $self = clone $this;
        $self['testProfile'] = $testProfile;

        return $self;
    }

    /**
     * @param TestProfileData|TestProfileDataShape|null $testProfileData
     */
    public function withTestProfileData(
        TestProfileData|array|null $testProfileData
    ): self {
        $self = clone $this;
        $self['testProfileData'] = $testProfileData;

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
