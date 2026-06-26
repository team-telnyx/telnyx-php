<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineParakeetConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case PARAKEET_TDT_0_6B_V3 = 'parakeet/tdt-0.6b-v3';
}
