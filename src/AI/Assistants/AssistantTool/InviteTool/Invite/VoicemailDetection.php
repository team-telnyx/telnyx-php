<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\VoicemailDetection\DetectionMode;
use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\VoicemailDetection\OnVoicemailDetected;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for voicemail detection (AMD - Answering Machine Detection) on the invited call.
 *
 * @phpstan-import-type OnVoicemailDetectedShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\VoicemailDetection\OnVoicemailDetected
 *
 * @phpstan-type VoicemailDetectionShape = array{
 *   detectionMode?: null|DetectionMode|value-of<DetectionMode>,
 *   onVoicemailDetected?: null|OnVoicemailDetected|OnVoicemailDetectedShape,
 * }
 */
final class VoicemailDetection implements BaseModel
{
    /** @use SdkModel<VoicemailDetectionShape> */
    use SdkModel;

    /**
     * The AMD detection mode to use. 'premium' enables premium answering machine detection. 'disabled' turns off AMD detection.
     *
     * @var value-of<DetectionMode>|null $detectionMode
     */
    #[Optional('detection_mode', enum: DetectionMode::class)]
    public ?string $detectionMode;

    /**
     * Action to take when voicemail is detected on the invited call.
     */
    #[Optional('on_voicemail_detected')]
    public ?OnVoicemailDetected $onVoicemailDetected;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DetectionMode|value-of<DetectionMode>|null $detectionMode
     * @param OnVoicemailDetected|OnVoicemailDetectedShape|null $onVoicemailDetected
     */
    public static function with(
        DetectionMode|string|null $detectionMode = null,
        OnVoicemailDetected|array|null $onVoicemailDetected = null,
    ): self {
        $self = new self;

        null !== $detectionMode && $self['detectionMode'] = $detectionMode;
        null !== $onVoicemailDetected && $self['onVoicemailDetected'] = $onVoicemailDetected;

        return $self;
    }

    /**
     * The AMD detection mode to use. 'premium' enables premium answering machine detection. 'disabled' turns off AMD detection.
     *
     * @param DetectionMode|value-of<DetectionMode> $detectionMode
     */
    public function withDetectionMode(DetectionMode|string $detectionMode): self
    {
        $self = clone $this;
        $self['detectionMode'] = $detectionMode;

        return $self;
    }

    /**
     * Action to take when voicemail is detected on the invited call.
     *
     * @param OnVoicemailDetected|OnVoicemailDetectedShape $onVoicemailDetected
     */
    public function withOnVoicemailDetected(
        OnVoicemailDetected|array $onVoicemailDetected
    ): self {
        $self = clone $this;
        $self['onVoicemailDetected'] = $onVoicemailDetected;

        return $self;
    }
}
