<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\ResembleClone;

/**
 * Language of the reference audio, matched case-insensitively. Pro: required, one of `ar`, `da`, `de`, `el`, `en-US`, `es`, `fi`, `fr-fr`, `he`, `hi`, `it`, `ja`, `ko`, `ms`, `nl`, `no`, `pl`, `pt`, `ru`, `sv`, `sw`, `tr`, `zh`. Turbo: `en` or `en-US` (default `en-US`). Urdu: `ur` (default). Other values return `422`.
 */
enum Language: string
{
    case AR = 'ar';

    case DA = 'da';

    case DE = 'de';

    case EL = 'el';

    case EN = 'en';

    case EN_US = 'en-US';

    case ES = 'es';

    case FI = 'fi';

    case FR_FR = 'fr-fr';

    case HE = 'he';

    case HI = 'hi';

    case IT = 'it';

    case JA = 'ja';

    case KO = 'ko';

    case MS = 'ms';

    case NL = 'nl';

    case NO = 'no';

    case PL = 'pl';

    case PT = 'pt';

    case RU = 'ru';

    case SV = 'sv';

    case SW = 'sw';

    case TR = 'tr';

    case UR = 'ur';

    case ZH = 'zh';
}
