<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineParakeetConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case NVIDIA_PARAKEET_V3 = 'nvidia/parakeet-v3';
}
