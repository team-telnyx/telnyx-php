<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartRecordingParams;

/**
 * Language code for transcription. Note: Not all languages are supported by all transcription engines (google, telnyx, deepgram). See engine-specific documentation for supported values.
 */
enum TranscriptionLanguage: string
{
    case AF = 'af';

    case AF_ZA = 'af-ZA';

    case AM = 'am';

    case AM_ET = 'am-ET';

    case AR = 'ar';

    case AR_AE = 'ar-AE';

    case AR_BH = 'ar-BH';

    case AR_DZ = 'ar-DZ';

    case AR_EG = 'ar-EG';

    case AR_IL = 'ar-IL';

    case AR_IQ = 'ar-IQ';

    case AR_JO = 'ar-JO';

    case AR_KW = 'ar-KW';

    case AR_LB = 'ar-LB';

    case AR_MA = 'ar-MA';

    case AR_MR = 'ar-MR';

    case AR_OM = 'ar-OM';

    case AR_PS = 'ar-PS';

    case AR_QA = 'ar-QA';

    case AR_SA = 'ar-SA';

    case AR_TN = 'ar-TN';

    case AR_YE = 'ar-YE';

    case AS = 'as';

    case AUTO_DETECT = 'auto_detect';

    case AZ = 'az';

    case AZ_AZ = 'az-AZ';

    case BA = 'ba';

    case BE = 'be';

    case BG = 'bg';

    case BG_BG = 'bg-BG';

    case BN = 'bn';

    case BN_BD = 'bn-BD';

    case BN_IN = 'bn-IN';

    case BO = 'bo';

    case BR = 'br';

    case BS = 'bs';

    case BS_BA = 'bs-BA';

    case CA = 'ca';

    case CA_ES = 'ca-ES';

    case CS = 'cs';

    case CS_CZ = 'cs-CZ';

    case CY = 'cy';

    case DA = 'da';

    case DA_DK = 'da-DK';

    case DE = 'de';

    case DE_AT = 'de-AT';

    case DE_CH = 'de-CH';

    case DE_DE = 'de-DE';

    case EL = 'el';

    case EL_GR = 'el-GR';

    case EN = 'en';

    case EN_AU = 'en-AU';

    case EN_CA = 'en-CA';

    case EN_GB = 'en-GB';

    case EN_GH = 'en-GH';

    case EN_HK = 'en-HK';

    case EN_IE = 'en-IE';

    case EN_IN = 'en-IN';

    case EN_KE = 'en-KE';

    case EN_NG = 'en-NG';

    case EN_NZ = 'en-NZ';

    case EN_PH = 'en-PH';

    case EN_PK = 'en-PK';

    case EN_SG = 'en-SG';

    case EN_TZ = 'en-TZ';

    case EN_US = 'en-US';

    case EN_ZA = 'en-ZA';

    case ES = 'es';

    case ES_419 = 'es-419';

    case ES_AR = 'es-AR';

    case ES_BO = 'es-BO';

    case ES_CL = 'es-CL';

    case ES_CO = 'es-CO';

    case ES_CR = 'es-CR';

    case ES_DO = 'es-DO';

    case ES_EC = 'es-EC';

    case ES_ES = 'es-ES';

    case ES_GT = 'es-GT';

    case ES_HN = 'es-HN';

    case ES_MX = 'es-MX';

    case ES_NI = 'es-NI';

    case ES_PA = 'es-PA';

    case ES_PE = 'es-PE';

    case ES_PR = 'es-PR';

    case ES_PY = 'es-PY';

    case ES_SV = 'es-SV';

    case ES_US = 'es-US';

    case ES_UY = 'es-UY';

    case ES_VE = 'es-VE';

    case ET = 'et';

    case ET_EE = 'et-EE';

    case EU = 'eu';

    case EU_ES = 'eu-ES';

    case FA = 'fa';

    case FA_IR = 'fa-IR';

    case FI = 'fi';

    case FI_FI = 'fi-FI';

    case FIL_PH = 'fil-PH';

    case FO = 'fo';

    case FR = 'fr';

    case FR_BE = 'fr-BE';

    case FR_CA = 'fr-CA';

    case FR_CH = 'fr-CH';

    case FR_FR = 'fr-FR';

    case GL = 'gl';

    case GL_ES = 'gl-ES';

    case GU = 'gu';

    case GU_IN = 'gu-IN';

    case HA = 'ha';

    case HAW = 'haw';

    case HE = 'he';

    case HI = 'hi';

    case HI_IN = 'hi-IN';

    case HR = 'hr';

    case HR_HR = 'hr-HR';

    case HT = 'ht';

    case HU = 'hu';

    case HU_HU = 'hu-HU';

    case HY = 'hy';

    case HY_AM = 'hy-AM';

    case ID = 'id';

    case ID_ID = 'id-ID';

    case IS = 'is';

    case IS_IS = 'is-IS';

    case IT = 'it';

    case IT_CH = 'it-CH';

    case IT_IT = 'it-IT';

    case IW_IL = 'iw-IL';

    case JA = 'ja';

    case JA_JP = 'ja-JP';

    case JV_ID = 'jv-ID';

    case JW = 'jw';

    case KA = 'ka';

    case KA_GE = 'ka-GE';

    case KK = 'kk';

    case KK_KZ = 'kk-KZ';

    case KM = 'km';

    case KM_KH = 'km-KH';

    case KN = 'kn';

    case KN_IN = 'kn-IN';

    case KO = 'ko';

    case KO_KR = 'ko-KR';

    case LA = 'la';

    case LB = 'lb';

    case LN = 'ln';

    case LO = 'lo';

    case LO_LA = 'lo-LA';

    case LT = 'lt';

    case LT_LT = 'lt-LT';

    case LV = 'lv';

    case LV_LV = 'lv-LV';

    case MG = 'mg';

    case MI = 'mi';

    case MK = 'mk';

    case MK_MK = 'mk-MK';

    case ML = 'ml';

    case ML_IN = 'ml-IN';

    case MN = 'mn';

    case MN_MN = 'mn-MN';

    case MR = 'mr';

    case MR_IN = 'mr-IN';

    case MS = 'ms';

    case MS_MY = 'ms-MY';

    case MT = 'mt';

    case MY = 'my';

    case MY_MM = 'my-MM';

    case NE = 'ne';

    case NE_NP = 'ne-NP';

    case NL = 'nl';

    case NL_BE = 'nl-BE';

    case NL_NL = 'nl-NL';

    case NN = 'nn';

    case NO = 'no';

    case NO_NO = 'no-NO';

    case OC = 'oc';

    case PA = 'pa';

    case PA_GURU_IN = 'pa-Guru-IN';

    case PL = 'pl';

    case PL_PL = 'pl-PL';

    case PS = 'ps';

    case PT = 'pt';

    case PT_BR = 'pt-BR';

    case PT_PT = 'pt-PT';

    case RO = 'ro';

    case RO_RO = 'ro-RO';

    case RU = 'ru';

    case RU_RU = 'ru-RU';

    case RW_RW = 'rw-RW';

    case SA = 'sa';

    case SD = 'sd';

    case SI = 'si';

    case SI_LK = 'si-LK';

    case SK = 'sk';

    case SK_SK = 'sk-SK';

    case SL = 'sl';

    case SL_SI = 'sl-SI';

    case SN = 'sn';

    case SO = 'so';

    case SQ = 'sq';

    case SQ_AL = 'sq-AL';

    case SR = 'sr';

    case SR_RS = 'sr-RS';

    case SS_LATN_ZA = 'ss-latn-za';

    case ST_ZA = 'st-ZA';

    case SU = 'su';

    case SU_ID = 'su-ID';

    case SV = 'sv';

    case SV_SE = 'sv-SE';

    case SW = 'sw';

    case SW_KE = 'sw-KE';

    case SW_TZ = 'sw-TZ';

    case TA = 'ta';

    case TA_IN = 'ta-IN';

    case TA_LK = 'ta-LK';

    case TA_MY = 'ta-MY';

    case TA_SG = 'ta-SG';

    case TE = 'te';

    case TE_IN = 'te-IN';

    case TG = 'tg';

    case TH = 'th';

    case TH_TH = 'th-TH';

    case TK = 'tk';

    case TL = 'tl';

    case TN_LATN_ZA = 'tn-latn-za';

    case TR = 'tr';

    case TR_TR = 'tr-TR';

    case TS_ZA = 'ts-ZA';

    case TT = 'tt';

    case UK = 'uk';

    case UK_UA = 'uk-UA';

    case UR = 'ur';

    case UR_IN = 'ur-IN';

    case UR_PK = 'ur-PK';

    case UZ = 'uz';

    case UZ_UZ = 'uz-UZ';

    case VE_ZA = 've-ZA';

    case VI = 'vi';

    case VI_VN = 'vi-VN';

    case XH_ZA = 'xh-ZA';

    case YI = 'yi';

    case YO = 'yo';

    case YUE_HANT_HK = 'yue-Hant-HK';

    case ZH = 'zh';

    case ZH_TW = 'zh-TW';

    case ZU_ZA = 'zu-ZA';
}
