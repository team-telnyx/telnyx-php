<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings;

use Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection\OnVoicemailDetected;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for voicemail detection (AMD - Answering Machine Detection) on outgoing calls.
 *
 * @phpstan-import-type OnVoicemailDetectedShape from \Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection\OnVoicemailDetected
 *
 * @phpstan-type VoicemailDetectionShape = array{
 *   onVoicemailDetected?: null|OnVoicemailDetected|OnVoicemailDetectedShape
 * }
 */
final class VoicemailDetection implements BaseModel
{
    /** @use SdkModel<VoicemailDetectionShape> */
    use SdkModel;

    /**
     * Action to take when voicemail is detected.
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
     * @param OnVoicemailDetected|OnVoicemailDetectedShape|null $onVoicemailDetected
     */
    public static function with(
        OnVoicemailDetected|array|null $onVoicemailDetected = null
    ): self {
        $self = new self;

        null !== $onVoicemailDetected && $self['onVoicemailDetected'] = $onVoicemailDetected;

        return $self;
    }

    /**
     * Action to take when voicemail is detected.
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
