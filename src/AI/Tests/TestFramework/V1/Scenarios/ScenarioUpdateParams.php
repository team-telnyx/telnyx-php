<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Updates the specified evaluator scenario.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::update()
 *
 * @phpstan-type ScenarioUpdateParamsShape = array{
 *   agent?: int|null,
 *   expectedOutcomePrompt?: string|null,
 *   firstMessage?: string|null,
 *   folderPath?: string|null,
 *   inboundPhoneNumber?: int|null,
 *   instructions?: string|null,
 *   maxDuration?: int|null,
 *   metrics?: list<int>|null,
 *   name?: string|null,
 *   personality?: int|null,
 *   phoneNumber?: int|null,
 *   scenarioLanguage?: string|null,
 *   tags?: list<string>|null,
 *   testProfile?: int|null,
 *   toolIDs?: list<string>|null,
 * }
 */
final class ScenarioUpdateParams implements BaseModel
{
    /** @use SdkModel<ScenarioUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?int $agent;

    #[Optional('expected_outcome_prompt')]
    public ?string $expectedOutcomePrompt;

    #[Optional('first_message')]
    public ?string $firstMessage;

    #[Optional('folder_path', nullable: true)]
    public ?string $folderPath;

    #[Optional('inbound_phone_number')]
    public ?int $inboundPhoneNumber;

    #[Optional]
    public ?string $instructions;

    #[Optional('max_duration', nullable: true)]
    public ?int $maxDuration;

    /** @var list<int>|null $metrics */
    #[Optional(list: 'int')]
    public ?array $metrics;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?int $personality;

    #[Optional('phone_number')]
    public ?int $phoneNumber;

    #[Optional('scenario_language')]
    public ?string $scenarioLanguage;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('test_profile')]
    public ?int $testProfile;

    /** @var list<string>|null $toolIDs */
    #[Optional('tool_ids', list: 'string')]
    public ?array $toolIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $metrics
     * @param list<string>|null $tags
     * @param list<string>|null $toolIDs
     */
    public static function with(
        int|Omitted|null $agent = Omitted::VALUE,
        string|Omitted|null $folderPath = Omitted::VALUE,
        int|Omitted|null $maxDuration = Omitted::VALUE,
        ?string $expectedOutcomePrompt = null,
        ?string $firstMessage = null,
        ?int $inboundPhoneNumber = null,
        ?string $instructions = null,
        ?array $metrics = null,
        ?string $name = null,
        ?int $personality = null,
        ?int $phoneNumber = null,
        ?string $scenarioLanguage = null,
        ?array $tags = null,
        ?int $testProfile = null,
        ?array $toolIDs = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $agent && $self['agent'] = $agent;
        null !== $expectedOutcomePrompt && $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;
        null !== $firstMessage && $self['firstMessage'] = $firstMessage;
        Omitted::VALUE !== $folderPath && $self['folderPath'] = $folderPath;
        null !== $inboundPhoneNumber && $self['inboundPhoneNumber'] = $inboundPhoneNumber;
        null !== $instructions && $self['instructions'] = $instructions;
        Omitted::VALUE !== $maxDuration && $self['maxDuration'] = $maxDuration;
        null !== $metrics && $self['metrics'] = $metrics;
        null !== $name && $self['name'] = $name;
        null !== $personality && $self['personality'] = $personality;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $scenarioLanguage && $self['scenarioLanguage'] = $scenarioLanguage;
        null !== $tags && $self['tags'] = $tags;
        null !== $testProfile && $self['testProfile'] = $testProfile;
        null !== $toolIDs && $self['toolIDs'] = $toolIDs;

        return $self;
    }

    public function withAgent(?int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

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

    public function withInboundPhoneNumber(int $inboundPhoneNumber): self
    {
        $self = clone $this;
        $self['inboundPhoneNumber'] = $inboundPhoneNumber;

        return $self;
    }

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    public function withMaxDuration(?int $maxDuration): self
    {
        $self = clone $this;
        $self['maxDuration'] = $maxDuration;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPersonality(int $personality): self
    {
        $self = clone $this;
        $self['personality'] = $personality;

        return $self;
    }

    public function withPhoneNumber(int $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withScenarioLanguage(string $scenarioLanguage): self
    {
        $self = clone $this;
        $self['scenarioLanguage'] = $scenarioLanguage;

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
