<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineHumainConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case HUMAIN_REALTIME = 'humain/realtime';
}
