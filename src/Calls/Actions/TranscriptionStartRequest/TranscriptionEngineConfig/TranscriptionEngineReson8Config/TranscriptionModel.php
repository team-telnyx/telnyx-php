<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineReson8Config;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case RESON8_TURNS = 'reson8/turns';
}
