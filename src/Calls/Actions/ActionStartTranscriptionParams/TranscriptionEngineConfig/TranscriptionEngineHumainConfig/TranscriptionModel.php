<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\TranscriptionEngineHumainConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case HUMAIN_REALTIME = 'humain/realtime';
}
