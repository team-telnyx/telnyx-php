<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineXaiConfig;

/**
 * Language to use for speech recognition.
 */
enum Language: string
{
    case AR = 'ar';

    case CS = 'cs';

    case DA = 'da';

    case DE = 'de';

    case EN = 'en';

    case ES = 'es';

    case FA = 'fa';

    case FIL = 'fil';

    case FR = 'fr';

    case HI = 'hi';

    case ID = 'id';

    case IT = 'it';

    case JA = 'ja';

    case KO = 'ko';

    case MK = 'mk';

    case MS = 'ms';

    case NL = 'nl';

    case PL = 'pl';

    case PT = 'pt';

    case RO = 'ro';

    case RU = 'ru';

    case SV = 'sv';

    case TH = 'th';

    case TR = 'tr';

    case VI = 'vi';
}
