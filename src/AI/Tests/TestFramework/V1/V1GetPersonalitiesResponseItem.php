<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem\StartSpeakingPlan;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type SpeedVariants from \Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem\Speed
 * @phpstan-import-type StartSpeakingPlanVariants from \Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem\StartSpeakingPlan
 * @phpstan-import-type SpeedShape from \Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem\Speed
 * @phpstan-import-type StartSpeakingPlanShape from \Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem\StartSpeakingPlan
 *
 * @phpstan-type V1GetPersonalitiesResponseItemShape = array{
 *   id: int,
 *   endCallEnabled: bool,
 *   language: string,
 *   name: string,
 *   prompt: string,
 *   accent?: string|null,
 *   backgroundNoise?: string|null,
 *   backgroundSoundVolume?: float|null,
 *   effectiveVoiceVolume?: float|null,
 *   forkedFrom?: int|null,
 *   generationConfig?: array<string,mixed>|null,
 *   interruptionLevel?: string|null,
 *   messagePlan?: array<string,mixed>|null,
 *   networkSimulation?: array<string,mixed>|null,
 *   organization?: int|null,
 *   project?: int|null,
 *   speed?: SpeedShape|null,
 *   startSpeakingPlan?: StartSpeakingPlanShape|null,
 *   stopSpeakingPlan?: array<string,mixed>|null,
 *   voiceVolume?: float|null,
 * }
 */
final class V1GetPersonalitiesResponseItem implements BaseModel
{
    /** @use SdkModel<V1GetPersonalitiesResponseItemShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required('end_call_enabled')]
    public bool $endCallEnabled;

    /**
     * ISO language code the simulated caller speaks.
     */
    #[Required]
    public string $language;

    /**
     * Display name of the personality.
     */
    #[Required]
    public string $name;

    /**
     * Instructions the simulated caller follows.
     */
    #[Required]
    public string $prompt;

    #[Optional]
    public ?string $accent;

    #[Optional('background_noise', nullable: true)]
    public ?string $backgroundNoise;

    #[Optional('background_sound_volume', nullable: true)]
    public ?float $backgroundSoundVolume;

    #[Optional('effective_voice_volume', nullable: true)]
    public ?float $effectiveVoiceVolume;

    /**
     * ID of the personality this one was forked from.
     */
    #[Optional('forked_from', nullable: true)]
    public ?int $forkedFrom;

    /** @var array<string,mixed>|null $generationConfig */
    #[Optional('generation_config', map: 'mixed', nullable: true)]
    public ?array $generationConfig;

    /**
     * How aggressively the personality interrupts the assistant.
     */
    #[Optional('interruption_level', nullable: true)]
    public ?string $interruptionLevel;

    /**
     * Idle-timeout plan for messages during a call.
     *
     * @var array<string,mixed>|null $messagePlan
     */
    #[Optional('message_plan', map: 'mixed', nullable: true)]
    public ?array $messagePlan;

    /** @var array<string,mixed>|null $networkSimulation */
    #[Optional('network_simulation', map: 'mixed', nullable: true)]
    public ?array $networkSimulation;

    #[Optional(nullable: true)]
    public ?int $organization;

    #[Optional(nullable: true)]
    public ?int $project;

    /** @var SpeedVariants|null $speed */
    #[Optional(nullable: true)]
    public float|string|null $speed;

    /** @var StartSpeakingPlanVariants|null $startSpeakingPlan */
    #[Optional(
        'start_speaking_plan',
        union: StartSpeakingPlan::class,
        nullable: true
    )]
    public float|array|null $startSpeakingPlan;

    /** @var array<string,mixed>|null $stopSpeakingPlan */
    #[Optional('stop_speaking_plan', map: 'mixed', nullable: true)]
    public ?array $stopSpeakingPlan;

    #[Optional('voice_volume', nullable: true)]
    public ?float $voiceVolume;

    /**
     * `new V1GetPersonalitiesResponseItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V1GetPersonalitiesResponseItem::with(
     *   id: ..., endCallEnabled: ..., language: ..., name: ..., prompt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V1GetPersonalitiesResponseItem)
     *   ->withID(...)
     *   ->withEndCallEnabled(...)
     *   ->withLanguage(...)
     *   ->withName(...)
     *   ->withPrompt(...)
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
     * @param Omitted|array<string,mixed>|null $generationConfig
     * @param Omitted|array<string,mixed>|null $messagePlan
     * @param Omitted|array<string,mixed>|null $networkSimulation
     * @param SpeedShape|Omitted|null $speed
     * @param StartSpeakingPlanShape|Omitted|null $startSpeakingPlan
     * @param Omitted|array<string,mixed>|null $stopSpeakingPlan
     */
    public static function with(
        int $id,
        bool $endCallEnabled,
        string $language,
        string $name,
        string $prompt,
        string|Omitted|null $backgroundNoise = Omitted::VALUE,
        float|Omitted|null $backgroundSoundVolume = Omitted::VALUE,
        float|Omitted|null $effectiveVoiceVolume = Omitted::VALUE,
        int|Omitted|null $forkedFrom = Omitted::VALUE,
        Omitted|array|null $generationConfig = Omitted::VALUE,
        string|Omitted|null $interruptionLevel = Omitted::VALUE,
        Omitted|array|null $messagePlan = Omitted::VALUE,
        Omitted|array|null $networkSimulation = Omitted::VALUE,
        int|Omitted|null $organization = Omitted::VALUE,
        int|Omitted|null $project = Omitted::VALUE,
        Omitted|float|string|null $speed = Omitted::VALUE,
        Omitted|float|array|null $startSpeakingPlan = Omitted::VALUE,
        Omitted|array|null $stopSpeakingPlan = Omitted::VALUE,
        float|Omitted|null $voiceVolume = Omitted::VALUE,
        ?string $accent = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['endCallEnabled'] = $endCallEnabled;
        $self['language'] = $language;
        $self['name'] = $name;
        $self['prompt'] = $prompt;

        null !== $accent && $self['accent'] = $accent;
        Omitted::VALUE !== $backgroundNoise && $self['backgroundNoise'] = $backgroundNoise;
        Omitted::VALUE !== $backgroundSoundVolume && $self['backgroundSoundVolume'] = $backgroundSoundVolume;
        Omitted::VALUE !== $effectiveVoiceVolume && $self['effectiveVoiceVolume'] = $effectiveVoiceVolume;
        Omitted::VALUE !== $forkedFrom && $self['forkedFrom'] = $forkedFrom;
        Omitted::VALUE !== $generationConfig && $self['generationConfig'] = $generationConfig;
        Omitted::VALUE !== $interruptionLevel && $self['interruptionLevel'] = $interruptionLevel;
        Omitted::VALUE !== $messagePlan && $self['messagePlan'] = $messagePlan;
        Omitted::VALUE !== $networkSimulation && $self['networkSimulation'] = $networkSimulation;
        Omitted::VALUE !== $organization && $self['organization'] = $organization;
        Omitted::VALUE !== $project && $self['project'] = $project;
        Omitted::VALUE !== $speed && $self['speed'] = $speed;
        Omitted::VALUE !== $startSpeakingPlan && $self['startSpeakingPlan'] = $startSpeakingPlan;
        Omitted::VALUE !== $stopSpeakingPlan && $self['stopSpeakingPlan'] = $stopSpeakingPlan;
        Omitted::VALUE !== $voiceVolume && $self['voiceVolume'] = $voiceVolume;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEndCallEnabled(bool $endCallEnabled): self
    {
        $self = clone $this;
        $self['endCallEnabled'] = $endCallEnabled;

        return $self;
    }

    /**
     * ISO language code the simulated caller speaks.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Display name of the personality.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Instructions the simulated caller follows.
     */
    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }

    public function withAccent(string $accent): self
    {
        $self = clone $this;
        $self['accent'] = $accent;

        return $self;
    }

    public function withBackgroundNoise(?string $backgroundNoise): self
    {
        $self = clone $this;
        $self['backgroundNoise'] = $backgroundNoise;

        return $self;
    }

    public function withBackgroundSoundVolume(
        ?float $backgroundSoundVolume
    ): self {
        $self = clone $this;
        $self['backgroundSoundVolume'] = $backgroundSoundVolume;

        return $self;
    }

    public function withEffectiveVoiceVolume(?float $effectiveVoiceVolume): self
    {
        $self = clone $this;
        $self['effectiveVoiceVolume'] = $effectiveVoiceVolume;

        return $self;
    }

    /**
     * ID of the personality this one was forked from.
     */
    public function withForkedFrom(?int $forkedFrom): self
    {
        $self = clone $this;
        $self['forkedFrom'] = $forkedFrom;

        return $self;
    }

    /**
     * @param array<string,mixed>|null $generationConfig
     */
    public function withGenerationConfig(?array $generationConfig): self
    {
        $self = clone $this;
        $self['generationConfig'] = $generationConfig;

        return $self;
    }

    /**
     * How aggressively the personality interrupts the assistant.
     */
    public function withInterruptionLevel(?string $interruptionLevel): self
    {
        $self = clone $this;
        $self['interruptionLevel'] = $interruptionLevel;

        return $self;
    }

    /**
     * Idle-timeout plan for messages during a call.
     *
     * @param array<string,mixed>|null $messagePlan
     */
    public function withMessagePlan(?array $messagePlan): self
    {
        $self = clone $this;
        $self['messagePlan'] = $messagePlan;

        return $self;
    }

    /**
     * @param array<string,mixed>|null $networkSimulation
     */
    public function withNetworkSimulation(?array $networkSimulation): self
    {
        $self = clone $this;
        $self['networkSimulation'] = $networkSimulation;

        return $self;
    }

    public function withOrganization(?int $organization): self
    {
        $self = clone $this;
        $self['organization'] = $organization;

        return $self;
    }

    public function withProject(?int $project): self
    {
        $self = clone $this;
        $self['project'] = $project;

        return $self;
    }

    /**
     * @param SpeedShape|null $speed
     */
    public function withSpeed(float|string|null $speed): self
    {
        $self = clone $this;
        $self['speed'] = $speed;

        return $self;
    }

    /**
     * @param StartSpeakingPlanShape|null $startSpeakingPlan
     */
    public function withStartSpeakingPlan(
        float|array|null $startSpeakingPlan
    ): self {
        $self = clone $this;
        $self['startSpeakingPlan'] = $startSpeakingPlan;

        return $self;
    }

    /**
     * @param array<string,mixed>|null $stopSpeakingPlan
     */
    public function withStopSpeakingPlan(?array $stopSpeakingPlan): self
    {
        $self = clone $this;
        $self['stopSpeakingPlan'] = $stopSpeakingPlan;

        return $self;
    }

    public function withVoiceVolume(?float $voiceVolume): self
    {
        $self = clone $this;
        $self['voiceVolume'] = $voiceVolume;

        return $self;
    }
}
