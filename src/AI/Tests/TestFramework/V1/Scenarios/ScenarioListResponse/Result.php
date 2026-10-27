<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse\Result\TestProfileData;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type TestProfileDataShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse\Result\TestProfileData
 *
 * @phpstan-type ResultShape = array{
 *   id: int,
 *   agent: int|null,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   dynamicVariableValues?: array<string,string>|null,
 *   expectedOutcomePrompt?: string|null,
 *   firstMessage?: string|null,
 *   folderPath?: string|null,
 *   inboundPhoneNumber?: int|null,
 *   inboundPhoneNumberData?: string|null,
 *   instructions?: string|null,
 *   lastUpdatedBy?: int|null,
 *   metricNames?: list<string>|null,
 *   metrics?: list<int>|null,
 *   personality?: int|null,
 *   personalityName?: string|null,
 *   phoneNumber?: string|null,
 *   scenarioLanguage?: string|null,
 *   scenarioType?: string|null,
 *   tags?: list<string>|null,
 *   testProfile?: int|null,
 *   testProfileData?: null|TestProfileData|TestProfileDataShape,
 *   toolIDs?: list<string>|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    #[Required]
    public int $id;

    /**
     * ID of the test agent the scenario runs against.
     */
    #[Required]
    public ?int $agent;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $name;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /** @var array<string,string>|null $dynamicVariableValues */
    #[Optional('dynamic_variable_values', map: 'string', nullable: true)]
    public ?array $dynamicVariableValues;

    /**
     * What a successful conversation looks like; scored by the expected-outcome metric.
     */
    #[Optional('expected_outcome_prompt')]
    public ?string $expectedOutcomePrompt;

    /**
     * First message the simulated caller speaks or sends.
     */
    #[Optional('first_message')]
    public ?string $firstMessage;

    #[Optional('folder_path', nullable: true)]
    public ?string $folderPath;

    #[Optional('inbound_phone_number', nullable: true)]
    public ?int $inboundPhoneNumber;

    #[Optional('inbound_phone_number_data', nullable: true)]
    public ?string $inboundPhoneNumberData;

    /**
     * What the simulated caller should do during the conversation.
     */
    #[Optional]
    public ?string $instructions;

    #[Optional('last_updated_by', nullable: true)]
    public ?int $lastUpdatedBy;

    /** @var list<string>|null $metricNames */
    #[Optional('metric_names', list: 'string')]
    public ?array $metricNames;

    /**
     * Metric IDs applied to the scenario.
     *
     * @var list<int>|null $metrics
     */
    #[Optional(list: 'int')]
    public ?array $metrics;

    /**
     * ID of the test personality the caller simulates.
     */
    #[Optional(nullable: true)]
    public ?int $personality;

    #[Optional('personality_name')]
    public ?string $personalityName;

    /**
     * Outbound phone number used to place the simulated call.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional('scenario_language', nullable: true)]
    public ?string $scenarioLanguage;

    /**
     * Type of scenario: workflow, red_teaming_voice, or red_teaming_text.
     */
    #[Optional('scenario_type')]
    public ?string $scenarioType;

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
     * `new Result()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Result::with(id: ..., agent: ..., createdAt: ..., name: ..., updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Result)
     *   ->withID(...)
     *   ->withAgent(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withUpdatedAt(...)
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
     * @param Omitted|TestProfileData|TestProfileDataShape|null $testProfileData
     * @param list<string>|null $metricNames
     * @param list<int>|null $metrics
     * @param list<string>|null $tags
     * @param list<string>|null $toolIDs
     */
    public static function with(
        int $id,
        ?int $agent,
        \DateTimeInterface $createdAt,
        string $name,
        \DateTimeInterface $updatedAt,
        Omitted|array|null $dynamicVariableValues = Omitted::VALUE,
        string|Omitted|null $folderPath = Omitted::VALUE,
        int|Omitted|null $inboundPhoneNumber = Omitted::VALUE,
        string|Omitted|null $inboundPhoneNumberData = Omitted::VALUE,
        int|Omitted|null $lastUpdatedBy = Omitted::VALUE,
        int|Omitted|null $personality = Omitted::VALUE,
        string|Omitted|null $scenarioLanguage = Omitted::VALUE,
        int|Omitted|null $testProfile = Omitted::VALUE,
        Omitted|TestProfileData|array|null $testProfileData = Omitted::VALUE,
        ?string $expectedOutcomePrompt = null,
        ?string $firstMessage = null,
        ?string $instructions = null,
        ?array $metricNames = null,
        ?array $metrics = null,
        ?string $personalityName = null,
        ?string $phoneNumber = null,
        ?string $scenarioType = null,
        ?array $tags = null,
        ?array $toolIDs = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['agent'] = $agent;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;

        Omitted::VALUE !== $dynamicVariableValues && $self['dynamicVariableValues'] = $dynamicVariableValues;
        null !== $expectedOutcomePrompt && $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;
        null !== $firstMessage && $self['firstMessage'] = $firstMessage;
        Omitted::VALUE !== $folderPath && $self['folderPath'] = $folderPath;
        Omitted::VALUE !== $inboundPhoneNumber && $self['inboundPhoneNumber'] = $inboundPhoneNumber;
        Omitted::VALUE !== $inboundPhoneNumberData && $self['inboundPhoneNumberData'] = $inboundPhoneNumberData;
        null !== $instructions && $self['instructions'] = $instructions;
        Omitted::VALUE !== $lastUpdatedBy && $self['lastUpdatedBy'] = $lastUpdatedBy;
        null !== $metricNames && $self['metricNames'] = $metricNames;
        null !== $metrics && $self['metrics'] = $metrics;
        Omitted::VALUE !== $personality && $self['personality'] = $personality;
        null !== $personalityName && $self['personalityName'] = $personalityName;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        Omitted::VALUE !== $scenarioLanguage && $self['scenarioLanguage'] = $scenarioLanguage;
        null !== $scenarioType && $self['scenarioType'] = $scenarioType;
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

    /**
     * ID of the test agent the scenario runs against.
     */
    public function withAgent(?int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

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

    /**
     * What a successful conversation looks like; scored by the expected-outcome metric.
     */
    public function withExpectedOutcomePrompt(
        string $expectedOutcomePrompt
    ): self {
        $self = clone $this;
        $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;

        return $self;
    }

    /**
     * First message the simulated caller speaks or sends.
     */
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

    public function withInboundPhoneNumberData(
        ?string $inboundPhoneNumberData
    ): self {
        $self = clone $this;
        $self['inboundPhoneNumberData'] = $inboundPhoneNumberData;

        return $self;
    }

    /**
     * What the simulated caller should do during the conversation.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    public function withLastUpdatedBy(?int $lastUpdatedBy): self
    {
        $self = clone $this;
        $self['lastUpdatedBy'] = $lastUpdatedBy;

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
     * Metric IDs applied to the scenario.
     *
     * @param list<int> $metrics
     */
    public function withMetrics(array $metrics): self
    {
        $self = clone $this;
        $self['metrics'] = $metrics;

        return $self;
    }

    /**
     * ID of the test personality the caller simulates.
     */
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

    /**
     * Outbound phone number used to place the simulated call.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withScenarioLanguage(?string $scenarioLanguage): self
    {
        $self = clone $this;
        $self['scenarioLanguage'] = $scenarioLanguage;

        return $self;
    }

    /**
     * Type of scenario: workflow, red_teaming_voice, or red_teaming_text.
     */
    public function withScenarioType(string $scenarioType): self
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
