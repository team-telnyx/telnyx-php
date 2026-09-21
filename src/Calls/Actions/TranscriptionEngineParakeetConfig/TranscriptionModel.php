<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineParakeetConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case NVIDIA_PARAKEET_V3 = 'nvidia/parakeet-v3';

    case OMI_HEALTH_OMI_MED_STT_V1 = 'omi-health/omi-med-stt-v1';
}
