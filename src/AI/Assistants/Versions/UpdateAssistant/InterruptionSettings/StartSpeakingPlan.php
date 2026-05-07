<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\InterruptionSettings;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\InterruptionSettings\StartSpeakingPlan\TranscriptionEndpointingPlan;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Controls when the assistant starts speaking after the user stops. These thresholds primarily apply to non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn detection is driven by the transcription end-of-turn settings under `transcription.settings` instead.
 *
 * @phpstan-import-type TranscriptionEndpointingPlanShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\InterruptionSettings\StartSpeakingPlan\TranscriptionEndpointingPlan
 *
 * @phpstan-type StartSpeakingPlanShape = array{
 *   transcriptionEndpointingPlan?: null|TranscriptionEndpointingPlan|TranscriptionEndpointingPlanShape,
 *   waitSeconds?: float|null,
 * }
 */
final class StartSpeakingPlan implements BaseModel
{
    /** @use SdkModel<StartSpeakingPlanShape> */
    use SdkModel;

    /**
     * Endpointing thresholds used to decide when the user has finished speaking. Applies to non turn-taking transcription models. For `deepgram/flux`, use `transcription.settings.eot_threshold` / `eot_timeout_ms` / `eager_eot_threshold`.
     */
    #[Optional('transcription_endpointing_plan')]
    public ?TranscriptionEndpointingPlan $transcriptionEndpointingPlan;

    /**
     * Minimum seconds to wait before the assistant starts speaking.
     */
    #[Optional('wait_seconds')]
    public ?float $waitSeconds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TranscriptionEndpointingPlan|TranscriptionEndpointingPlanShape|null $transcriptionEndpointingPlan
     */
    public static function with(
        TranscriptionEndpointingPlan|array|null $transcriptionEndpointingPlan = null,
        ?float $waitSeconds = null,
    ): self {
        $self = new self;

        null !== $transcriptionEndpointingPlan && $self['transcriptionEndpointingPlan'] = $transcriptionEndpointingPlan;
        null !== $waitSeconds && $self['waitSeconds'] = $waitSeconds;

        return $self;
    }

    /**
     * Endpointing thresholds used to decide when the user has finished speaking. Applies to non turn-taking transcription models. For `deepgram/flux`, use `transcription.settings.eot_threshold` / `eot_timeout_ms` / `eager_eot_threshold`.
     *
     * @param TranscriptionEndpointingPlan|TranscriptionEndpointingPlanShape $transcriptionEndpointingPlan
     */
    public function withTranscriptionEndpointingPlan(
        TranscriptionEndpointingPlan|array $transcriptionEndpointingPlan
    ): self {
        $self = clone $this;
        $self['transcriptionEndpointingPlan'] = $transcriptionEndpointingPlan;

        return $self;
    }

    /**
     * Minimum seconds to wait before the assistant starts speaking.
     */
    public function withWaitSeconds(float $waitSeconds): self
    {
        $self = clone $this;
        $self['waitSeconds'] = $waitSeconds;

        return $self;
    }
}
