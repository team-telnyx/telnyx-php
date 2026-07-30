<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineReson8Config;

/**
 * The language of the audio to be transcribed. `auto` (the default, also applied when `language` is omitted) enables automatic language detection.
 */
enum Language: string
{
    case AUTO = 'auto';

    case NL = 'nl';

    case EN = 'en';

    case FR = 'fr';

    case FY = 'fy';

    case DE = 'de';

    case IT = 'it';

    case PL = 'pl';

    case PT = 'pt';

    case ES = 'es';

    case SV = 'sv';
}
