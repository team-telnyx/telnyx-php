<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineHumainConfig;

/**
 * The language of the audio to be transcribed. `codeswitch` enables Arabic/English code-switching. `auto` resolves server-side to code-switching.
 */
enum Language: string
{
    case AR = 'ar';

    case EN = 'en';

    case CODESWITCH = 'codeswitch';

    case AUTO = 'auto';
}
