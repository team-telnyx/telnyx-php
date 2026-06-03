<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineSonioxConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case SONIOX_STT_RT_V4 = 'soniox/stt-rt-v4';
}
