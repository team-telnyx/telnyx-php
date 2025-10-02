<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineDeepgramConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';
}
