<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Settings for interruptions and how the assistant decides the user has finished speaking. These timings are most relevant when using non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn behavior is controlled by the transcription end-of-turn settings under `transcription.settings` (`eot_threshold`, `eot_timeout_ms`, `eager_eot_threshold`).
 *
 * @phpstan-import-type StartSpeakingPlanShape from \Telnyx\AI\Assistants\StartSpeakingPlan
 *
 * @phpstan-type InferenceEmbeddingInterruptionSettingsShape = array{
 *   disableGreetingInterruption?: bool|null,
 *   enable?: bool|null,
 *   interruptPredictionThreshold?: float|null,
 *   startSpeakingPlan?: null|StartSpeakingPlan|StartSpeakingPlanShape,
 * }
 */
final class InferenceEmbeddingInterruptionSettings implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingInterruptionSettingsShape> */
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
     * Interrupt-prediction sensitivity, from 0.0 to 1.0. Set to null or 0.0 to disable interrupt prediction.
     */
    #[Optional('interrupt_prediction_threshold', nullable: true)]
    public ?float $interruptPredictionThreshold;

    /**
     * Controls when the assistant starts speaking after the user stops. These thresholds primarily apply to non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn detection is driven by the transcription end-of-turn settings under `transcription.settings` instead.
     *
     * Sending any `start_speaking_plan` object — an empty `{}` included (the stored config fills in field defaults) — engages per-turn transcript matching: on each turn the transcript tail is evaluated against the configured `transcription_endpointing_plan` tiers, and the wait is set to the matching tier's seconds. When the transcript ends without terminal punctuation or a number and `transcription_endpointing_plan` is set, its `on_no_punctuation_seconds` tier applies. Only when no tier matches (`transcription_endpointing_plan` unset or null) does the wait stay on `wait_seconds`. Setting `start_speaking_plan` to `null` (or omitting it) turns per-turn matching off entirely, and the assistant starts speaking as soon as silence is detected.
     */
    #[Optional('start_speaking_plan', nullable: true)]
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
     * @param Omitted|StartSpeakingPlan|StartSpeakingPlanShape|null $startSpeakingPlan
     */
    public static function with(
        float|Omitted|null $interruptPredictionThreshold = Omitted::VALUE,
        Omitted|StartSpeakingPlan|array|null $startSpeakingPlan = Omitted::VALUE,
        ?bool $disableGreetingInterruption = null,
        ?bool $enable = null,
    ): self {
        $self = new self;

        null !== $disableGreetingInterruption && $self['disableGreetingInterruption'] = $disableGreetingInterruption;
        null !== $enable && $self['enable'] = $enable;
        Omitted::VALUE !== $interruptPredictionThreshold && $self['interruptPredictionThreshold'] = $interruptPredictionThreshold;
        Omitted::VALUE !== $startSpeakingPlan && $self['startSpeakingPlan'] = $startSpeakingPlan;

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
     * Interrupt-prediction sensitivity, from 0.0 to 1.0. Set to null or 0.0 to disable interrupt prediction.
     */
    public function withInterruptPredictionThreshold(
        ?float $interruptPredictionThreshold
    ): self {
        $self = clone $this;
        $self['interruptPredictionThreshold'] = $interruptPredictionThreshold;

        return $self;
    }

    /**
     * Controls when the assistant starts speaking after the user stops. These thresholds primarily apply to non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn detection is driven by the transcription end-of-turn settings under `transcription.settings` instead.
     *
     * Sending any `start_speaking_plan` object — an empty `{}` included (the stored config fills in field defaults) — engages per-turn transcript matching: on each turn the transcript tail is evaluated against the configured `transcription_endpointing_plan` tiers, and the wait is set to the matching tier's seconds. When the transcript ends without terminal punctuation or a number and `transcription_endpointing_plan` is set, its `on_no_punctuation_seconds` tier applies. Only when no tier matches (`transcription_endpointing_plan` unset or null) does the wait stay on `wait_seconds`. Setting `start_speaking_plan` to `null` (or omitting it) turns per-turn matching off entirely, and the assistant starts speaking as soon as silence is detected.
     *
     * @param StartSpeakingPlan|StartSpeakingPlanShape|null $startSpeakingPlan
     */
    public function withStartSpeakingPlan(
        StartSpeakingPlan|array|null $startSpeakingPlan
    ): self {
        $self = clone $this;
        $self['startSpeakingPlan'] = $startSpeakingPlan;

        return $self;
    }
}
