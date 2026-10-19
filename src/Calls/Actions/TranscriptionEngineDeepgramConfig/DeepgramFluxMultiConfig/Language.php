<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxMultiConfig;

/**
 * Language to transcribe. Flux-multi uses the language as a hint; `auto` lets Flux detect the language.
 */
enum Language: string
{
    case EN = 'en';

    case ES = 'es';

    case FR = 'fr';

    case DE = 'de';

    case HI = 'hi';

    case RU = 'ru';

    case PT = 'pt';

    case JA = 'ja';

    case IT = 'it';

    case NL = 'nl';

    case AUTO = 'auto';
}
