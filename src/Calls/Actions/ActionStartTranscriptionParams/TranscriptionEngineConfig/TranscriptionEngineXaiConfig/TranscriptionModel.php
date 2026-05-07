<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\TranscriptionEngineXaiConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case XAI_GROK_STT = 'xai/grok-stt';
}
