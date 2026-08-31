<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineCohereConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case COHERE_AR_STT = 'cohere/ar-stt';
}
