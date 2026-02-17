<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\DetectionConfig;
use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\DetectionMode;
use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for voicemail detection (AMD - Answering Machine Detection) on the transferred call. Allows the assistant to detect when a voicemail system answers the transferred call and take appropriate action.
 *
 * @phpstan-import-type DetectionConfigShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\DetectionConfig
 * @phpstan-import-type OnVoicemailDetectedShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected
 *
 * @phpstan-type VoicemailDetectionShape = array{
 *   detectionConfig?: null|DetectionConfig|DetectionConfigShape,
 *   detectionMode?: null|DetectionMode|value-of<DetectionMode>,
 *   onVoicemailDetected?: null|OnVoicemailDetected|OnVoicemailDetectedShape,
 * }
 */
final class VoicemailDetection implements BaseModel
{
    /** @use SdkModel<VoicemailDetectionShape> */
    use SdkModel;

    /**
     * Advanced AMD detection configuration parameters. All values are optional - Telnyx will use defaults if not specified.
     */
    #[Optional('detection_config')]
    public ?DetectionConfig $detectionConfig;

    /**
     * The AMD detection mode to use. 'premium' enables premium answering machine detection. 'disabled' turns off AMD detection.
     *
     * @var value-of<DetectionMode>|null $detectionMode
     */
    #[Optional('detection_mode', enum: DetectionMode::class)]
    public ?string $detectionMode;

    /**
     * Action to take when voicemail is detected on the transferred call.
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
     * @param DetectionConfig|DetectionConfigShape|null $detectionConfig
     * @param DetectionMode|value-of<DetectionMode>|null $detectionMode
     * @param OnVoicemailDetected|OnVoicemailDetectedShape|null $onVoicemailDetected
     */
    public static function with(
        DetectionConfig|array|null $detectionConfig = null,
        DetectionMode|string|null $detectionMode = null,
        OnVoicemailDetected|array|null $onVoicemailDetected = null,
    ): self {
        $self = new self;

        null !== $detectionConfig && $self['detectionConfig'] = $detectionConfig;
        null !== $detectionMode && $self['detectionMode'] = $detectionMode;
        null !== $onVoicemailDetected && $self['onVoicemailDetected'] = $onVoicemailDetected;

        return $self;
    }

    /**
     * Advanced AMD detection configuration parameters. All values are optional - Telnyx will use defaults if not specified.
     *
     * @param DetectionConfig|DetectionConfigShape $detectionConfig
     */
    public function withDetectionConfig(
        DetectionConfig|array $detectionConfig
    ): self {
        $self = clone $this;
        $self['detectionConfig'] = $detectionConfig;

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
     * Action to take when voicemail is detected on the transferred call.
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
