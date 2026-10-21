<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineSpeechmaticsConfig;

/**
 * Language to use for speech recognition. Accepted values depend on the selected `transcription_model`. `speechmatics/standard` supports: `en`, `ba`, `eu`, `gl`, `ga`, `mt`, `mn`, `sw`, `ug`, `cy`, `ar_en`, `cmn_en`, `en_ms`, `en_ta`, `tl`, `es-bilingual-en`, `cmn_en_ms_ta`. `speechmatics/linden-1` (preview) supports the same languages as Speechmatics Realtime: `ar`, `ar_en`, `ba`, `be`, `bg`, `bn`, `ca`, `cmn`, `cmn_en`, `cmn_en_ms_ta`, `cs`, `cy`, `da`, `de`, `el`, `en`, `en_ms`, `en_ta`, `eo`, `es`, `es-bilingual-en`, `et`, `eu`, `fa`, `fi`, `fr`, `ga`, `gl`, `he`, `hi`, `hr`, `hu`, `ia`, `id`, `it`, `ja`, `ko`, `lt`, `lv`, `mn`, `mr`, `ms`, `mt`, `nl`, `no`, `pl`, `pt`, `ro`, `ru`, `sk`, `sl`, `sv`, `sw`, `ta`, `th`, `tl`, `tr`, `ug`, `uk`, `ur`, `vi`, `yue`, plus the spelling and script variants `en-US`, `en-GB`, `en-AU`, `cmn-Hans`, and `cmn-Hant` (`en` alone uses the default spelling). A value outside the selected model's list is rejected. For `speechmatics/standard`, unset, blank, `auto`, `auto_beta`, or `multi` defaults to `en`; for `speechmatics/linden-1`, only an unset language defaults to `en`, and `auto`, `auto_beta`, or `multi` is rejected.
 */
enum Language: string
{
    case EN = 'en';

    case BA = 'ba';

    case EU = 'eu';

    case GL = 'gl';

    case GA = 'ga';

    case MT = 'mt';

    case MN = 'mn';

    case SW = 'sw';

    case UG = 'ug';

    case CY = 'cy';

    case AR_EN = 'ar_en';

    case CMN_EN = 'cmn_en';

    case EN_MS = 'en_ms';

    case EN_TA = 'en_ta';

    case TL = 'tl';

    case ES_BILINGUAL_EN = 'es-bilingual-en';

    case CMN_EN_MS_TA = 'cmn_en_ms_ta';

    case AR = 'ar';

    case BE = 'be';

    case BG = 'bg';

    case BN = 'bn';

    case CA = 'ca';

    case CMN = 'cmn';

    case CS = 'cs';

    case DA = 'da';

    case DE = 'de';

    case EL = 'el';

    case EO = 'eo';

    case ES = 'es';

    case ET = 'et';

    case FA = 'fa';

    case FI = 'fi';

    case FR = 'fr';

    case HE = 'he';

    case HI = 'hi';

    case HR = 'hr';

    case HU = 'hu';

    case IA = 'ia';

    case ID = 'id';

    case IT = 'it';

    case JA = 'ja';

    case KO = 'ko';

    case LT = 'lt';

    case LV = 'lv';

    case MR = 'mr';

    case MS = 'ms';

    case NL = 'nl';

    case NO = 'no';

    case PL = 'pl';

    case PT = 'pt';

    case RO = 'ro';

    case RU = 'ru';

    case SK = 'sk';

    case SL = 'sl';

    case SV = 'sv';

    case TA = 'ta';

    case TH = 'th';

    case TR = 'tr';

    case UK = 'uk';

    case UR = 'ur';

    case VI = 'vi';

    case YUE = 'yue';

    case EN_US = 'en-US';

    case EN_GB = 'en-GB';

    case EN_AU = 'en-AU';

    case CMN_HANS = 'cmn-Hans';

    case CMN_HANT = 'cmn-Hant';
}
