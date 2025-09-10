<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionBridgeParams;

/**
 * Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
 */
enum Ringtone: string
{
    case AT = 'at';

    case AU = 'au';

    case BE = 'be';

    case BG = 'bg';

    case BR = 'br';

    case CH = 'ch';

    case CL = 'cl';

    case CN = 'cn';

    case CZ = 'cz';

    case DE = 'de';

    case DK = 'dk';

    case EE = 'ee';

    case ES = 'es';

    case FI = 'fi';

    case FR = 'fr';

    case GR = 'gr';

    case HU = 'hu';

    case IL = 'il';

    case IN = 'in';

    case IT = 'it';

    case JP = 'jp';

    case LT = 'lt';

    case MX = 'mx';

    case MY = 'my';

    case NL = 'nl';

    case NO = 'no';

    case NZ = 'nz';

    case PH = 'ph';

    case PL = 'pl';

    case PT = 'pt';

    case RU = 'ru';

    case SE = 'se';

    case SG = 'sg';

    case TH = 'th';

    case TW = 'tw';

    case UK = 'uk';

    case US_OLD = 'us-old';

    case US = 'us';

    case VE = 've';

    case ZA = 'za';
}
