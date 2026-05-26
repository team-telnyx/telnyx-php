<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams;

use Telnyx\AI\Assistants\Versions\VersionUpdateParams\InterruptionSettings\StartSpeakingPlan;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Settings for interruptions and how the assistant decides the user has finished speaking. These timings are most relevant when using non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn behavior is controlled by the transcription end-of-turn settings under `transcription.settings` (`eot_threshold`, `eot_timeout_ms`, `eager_eot_threshold`).
 *
 * @phpstan-import-type StartSpeakingPlanShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\InterruptionSettings\StartSpeakingPlan
 *
 * @phpstan-type InterruptionSettingsShape = array{
 *   disableGreetingInterruption?: bool|null,
 *   enable?: bool|null,
 *   startSpeakingPlan?: null|StartSpeakingPlan|StartSpeakingPlanShape,
 * }
 */
final class InterruptionSettings implements BaseModel
{
    /** @use SdkModel<InterruptionSettingsShape> */
    use SdkModel;

    /**
     * When true, disables user interruptions while the assistant greeting is playing.
     */
    #[Optional('disable_greeting_interruption')]
    public ?bool $disableGreetingInterruption;

    /**
     * Whether users can interrupt the assistant while it is speaking.
     */
    #[Optional]
    public ?bool $enable;

    /**
     * Controls when the assistant starts speaking after the user stops. These thresholds primarily apply to non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn detection is driven by the transcription end-of-turn settings under `transcription.settings` instead.
     */
    #[Optional('start_speaking_plan')]
    public ?StartSpeakingPlan $startSpeakingPlan;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param StartSpeakingPlan|StartSpeakingPlanShape|null $startSpeakingPlan
     */
    public static function with(
        ?bool $disableGreetingInterruption = null,
        ?bool $enable = null,
        StartSpeakingPlan|array|null $startSpeakingPlan = null,
    ): self {
        $self = new self;

        null !== $disableGreetingInterruption && $self['disableGreetingInterruption'] = $disableGreetingInterruption;
        null !== $enable && $self['enable'] = $enable;
        null !== $startSpeakingPlan && $self['startSpeakingPlan'] = $startSpeakingPlan;

        return $self;
    }

    /**
     * When true, disables user interruptions while the assistant greeting is playing.
     */
    public function withDisableGreetingInterruption(
        bool $disableGreetingInterruption
    ): self {
        $self = clone $this;
        $self['disableGreetingInterruption'] = $disableGreetingInterruption;

        return $self;
    }

    /**
     * Whether users can interrupt the assistant while it is speaking.
     */
    public function withEnable(bool $enable): self
    {
        $self = clone $this;
        $self['enable'] = $enable;

        return $self;
    }

    /**
     * Controls when the assistant starts speaking after the user stops. These thresholds primarily apply to non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn detection is driven by the transcription end-of-turn settings under `transcription.settings` instead.
     *
     * @param StartSpeakingPlan|StartSpeakingPlanShape $startSpeakingPlan
     */
    public function withStartSpeakingPlan(
        StartSpeakingPlan|array $startSpeakingPlan
    ): self {
        $self = clone $this;
        $self['startSpeakingPlan'] = $startSpeakingPlan;

        return $self;
    }
}
