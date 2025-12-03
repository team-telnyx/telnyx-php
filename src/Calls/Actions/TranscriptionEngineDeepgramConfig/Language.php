<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig;

/**
 * Language to use for speech recognition. Available languages depend on the selected model.
 */
enum Language: string
{
    case BG = 'bg';

    case CA = 'ca';

    case ZH = 'zh';

    case ZH_CN = 'zh-CN';

    case ZH_HANS = 'zh-Hans';

    case ZH_TW = 'zh-TW';

    case ZH_HANT = 'zh-Hant';

    case ZH_HK = 'zh-HK';

    case CS = 'cs';

    case DA = 'da';

    case DA_DK = 'da-DK';

    case NL = 'nl';

    case EN = 'en';

    case EN_US = 'en-US';

    case EN_AU = 'en-AU';

    case EN_GB = 'en-GB';

    case EN_NZ = 'en-NZ';

    case EN_IN = 'en-IN';

    case ET = 'et';

    case FI = 'fi';

    case NL_BE = 'nl-BE';

    case FR = 'fr';

    case FR_CA = 'fr-CA';

    case DE = 'de';

    case DE_CH = 'de-CH';

    case EL = 'el';

    case HI = 'hi';

    case HU = 'hu';

    case ID = 'id';

    case IT = 'it';

    case JA = 'ja';

    case KO = 'ko';

    case KO_KR = 'ko-KR';

    case LV = 'lv';

    case LT = 'lt';

    case MS = 'ms';

    case NO = 'no';

    case PL = 'pl';

    case PT = 'pt';

    case PT_BR = 'pt-BR';

    case PT_PT = 'pt-PT';

    case RO = 'ro';

    case RU = 'ru';

    case SK = 'sk';

    case ES = 'es';

    case ES_419 = 'es-419';

    case SV = 'sv';

    case SV_SE = 'sv-SE';

    case TH = 'th';

    case TH_TH = 'th-TH';

    case TR = 'tr';

    case UK = 'uk';

    case VI = 'vi';

    case AUTO_DETECT = 'auto_detect';
}
