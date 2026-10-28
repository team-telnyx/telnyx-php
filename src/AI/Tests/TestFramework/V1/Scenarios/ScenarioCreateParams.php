<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Creates an evaluator scenario in your organization.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::create()
 *
 * @phpstan-type ScenarioCreateParamsShape = array{
 *   name: string,
 *   personality: int,
 *   agent?: int|null,
 *   expectedOutcomePrompt?: string|null,
 *   firstMessage?: string|null,
 *   folderPath?: string|null,
 *   instructions?: string|null,
 *   metrics?: list<int>|null,
 *   tags?: list<string>|null,
 *   testProfile?: int|null,
 * }
 */
final class ScenarioCreateParams implements BaseModel
{
    /** @use SdkModel<ScenarioCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

    /**
     * ID of the personality the caller simulates.
     */
    #[Required]
    public int $personality;

    #[Optional(nullable: true)]
    public ?int $agent;

    #[Optional('expected_outcome_prompt')]
    public ?string $expectedOutcomePrompt;

    #[Optional('first_message')]
    public ?string $firstMessage;

    #[Optional('folder_path', nullable: true)]
    public ?string $folderPath;

    #[Optional]
    public ?string $instructions;

    /** @var list<int>|null $metrics */
    #[Optional(list: 'int')]
    public ?array $metrics;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('test_profile')]
    public ?int $testProfile;

    /**
     * `new ScenarioCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioCreateParams::with(name: ..., personality: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioCreateParams)->withName(...)->withPersonality(...)
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
     * @param list<int>|null $metrics
     * @param list<string>|null $tags
     */
    public static function with(
        string $name,
        int $personality,
        int|Omitted|null $agent = Omitted::VALUE,
        string|Omitted|null $folderPath = Omitted::VALUE,
        ?string $expectedOutcomePrompt = null,
        ?string $firstMessage = null,
        ?string $instructions = null,
        ?array $metrics = null,
        ?array $tags = null,
        ?int $testProfile = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['personality'] = $personality;

        Omitted::VALUE !== $agent && $self['agent'] = $agent;
        null !== $expectedOutcomePrompt && $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;
        null !== $firstMessage && $self['firstMessage'] = $firstMessage;
        Omitted::VALUE !== $folderPath && $self['folderPath'] = $folderPath;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $metrics && $self['metrics'] = $metrics;
        null !== $tags && $self['tags'] = $tags;
        null !== $testProfile && $self['testProfile'] = $testProfile;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * ID of the personality the caller simulates.
     */
    public function withPersonality(int $personality): self
    {
        $self = clone $this;
        $self['personality'] = $personality;

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

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

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
}
