<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineCohereConfig;

/**
 * The language of the audio to be transcribed. Unlike other self-hosted models, Cohere does not auto-detect the language; `auto` is not supported.
 */
enum Language: string
{
    case AR = 'ar';

    case EN = 'en';
}
