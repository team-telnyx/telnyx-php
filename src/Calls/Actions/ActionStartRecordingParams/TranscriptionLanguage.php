<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartRecordingParams;

enum TranscriptionLanguage: string
{
    case AF_ZA = 'af-ZA';

    case AM_ET = 'am-ET';

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

    case AZ_AZ = 'az-AZ';

    case BG_BG = 'bg-BG';

    case BN_BD = 'bn-BD';

    case BN_IN = 'bn-IN';

    case BS_BA = 'bs-BA';

    case CA_ES = 'ca-ES';

    case CS_CZ = 'cs-CZ';

    case DA_DK = 'da-DK';

    case DE_AT = 'de-AT';

    case DE_CH = 'de-CH';

    case DE_DE = 'de-DE';

    case EL_GR = 'el-GR';

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

    case ET_EE = 'et-EE';

    case EU_ES = 'eu-ES';

    case FA_IR = 'fa-IR';

    case FI_FI = 'fi-FI';

    case FIL_PH = 'fil-PH';

    case FR_BE = 'fr-BE';

    case FR_CA = 'fr-CA';

    case FR_CH = 'fr-CH';

    case FR_FR = 'fr-FR';

    case GL_ES = 'gl-ES';

    case GU_IN = 'gu-IN';

    case HI_IN = 'hi-IN';

    case HR_HR = 'hr-HR';

    case HU_HU = 'hu-HU';

    case HY_AM = 'hy-AM';

    case ID_ID = 'id-ID';

    case IS_IS = 'is-IS';

    case IT_CH = 'it-CH';

    case IT_IT = 'it-IT';

    case IW_IL = 'iw-IL';

    case JA_JP = 'ja-JP';

    case JV_ID = 'jv-ID';

    case KA_GE = 'ka-GE';

    case KK_KZ = 'kk-KZ';

    case KM_KH = 'km-KH';

    case KN_IN = 'kn-IN';

    case KO_KR = 'ko-KR';

    case LO_LA = 'lo-LA';

    case LT_LT = 'lt-LT';

    case LV_LV = 'lv-LV';

    case MK_MK = 'mk-MK';

    case ML_IN = 'ml-IN';

    case MN_MN = 'mn-MN';

    case MR_IN = 'mr-IN';

    case MS_MY = 'ms-MY';

    case MY_MM = 'my-MM';

    case NE_NP = 'ne-NP';

    case NL_BE = 'nl-BE';

    case NL_NL = 'nl-NL';

    case NO_NO = 'no-NO';

    case PA_GURU_IN = 'pa-Guru-IN';

    case PL_PL = 'pl-PL';

    case PT_BR = 'pt-BR';

    case PT_PT = 'pt-PT';

    case RO_RO = 'ro-RO';

    case RU_RU = 'ru-RU';

    case RW_RW = 'rw-RW';

    case SI_LK = 'si-LK';

    case SK_SK = 'sk-SK';

    case SL_SI = 'sl-SI';

    case SQ_AL = 'sq-AL';

    case SR_RS = 'sr-RS';

    case SS_LATN_ZA = 'ss-latn-za';

    case ST_ZA = 'st-ZA';

    case SU_ID = 'su-ID';

    case SV_SE = 'sv-SE';

    case SW_KE = 'sw-KE';

    case SW_TZ = 'sw-TZ';

    case TA_IN = 'ta-IN';

    case TA_LK = 'ta-LK';

    case TA_MY = 'ta-MY';

    case TA_SG = 'ta-SG';

    case TE_IN = 'te-IN';

    case TH_TH = 'th-TH';

    case TN_LATN_ZA = 'tn-latn-za';

    case TR_TR = 'tr-TR';

    case TS_ZA = 'ts-ZA';

    case UK_UA = 'uk-UA';

    case UR_IN = 'ur-IN';

    case UR_PK = 'ur-PK';

    case UZ_UZ = 'uz-UZ';

    case VE_ZA = 've-ZA';

    case VI_VN = 'vi-VN';

    case XH_ZA = 'xh-ZA';

    case YUE_HANT_HK = 'yue-Hant-HK';

    case ZH = 'zh';

    case ZH_TW = 'zh-TW';

    case ZU_ZA = 'zu-ZA';

    case EN = 'en';

    case DE = 'de';

    case ES = 'es';

    case RU = 'ru';

    case KO = 'ko';

    case FR = 'fr';

    case JA = 'ja';

    case PT = 'pt';

    case TR = 'tr';

    case PL = 'pl';

    case CA = 'ca';

    case NL = 'nl';

    case AR = 'ar';

    case SV = 'sv';

    case IT = 'it';

    case ID = 'id';

    case HI = 'hi';

    case FI = 'fi';

    case VI = 'vi';

    case HE = 'he';

    case UK = 'uk';

    case EL = 'el';

    case MS = 'ms';

    case CS = 'cs';

    case RO = 'ro';

    case DA = 'da';

    case HU = 'hu';

    case TA = 'ta';

    case NO = 'no';

    case TH = 'th';

    case UR = 'ur';

    case HR = 'hr';

    case BG = 'bg';

    case LT = 'lt';

    case LA = 'la';

    case MI = 'mi';

    case ML = 'ml';

    case CY = 'cy';

    case SK = 'sk';

    case TE = 'te';

    case FA = 'fa';

    case LV = 'lv';

    case BN = 'bn';

    case SR = 'sr';

    case AZ = 'az';

    case SL = 'sl';

    case KN = 'kn';

    case ET = 'et';

    case MK = 'mk';

    case BR = 'br';

    case EU = 'eu';

    case IS = 'is';

    case HY = 'hy';

    case NE = 'ne';

    case MN = 'mn';

    case BS = 'bs';

    case KK = 'kk';

    case SQ = 'sq';

    case SW = 'sw';

    case GL = 'gl';

    case MR = 'mr';

    case PA = 'pa';

    case SI = 'si';

    case KM = 'km';

    case SN = 'sn';

    case YO = 'yo';

    case SO = 'so';

    case AF = 'af';

    case OC = 'oc';

    case KA = 'ka';

    case BE = 'be';

    case TG = 'tg';

    case SD = 'sd';

    case GU = 'gu';

    case AM = 'am';

    case YI = 'yi';

    case LO = 'lo';

    case UZ = 'uz';

    case FO = 'fo';

    case HT = 'ht';

    case PS = 'ps';

    case TK = 'tk';

    case NN = 'nn';

    case MT = 'mt';

    case SA = 'sa';

    case LB = 'lb';

    case MY = 'my';

    case BO = 'bo';

    case TL = 'tl';

    case MG = 'mg';

    case AS = 'as';

    case TT = 'tt';

    case HAW = 'haw';

    case LN = 'ln';

    case HA = 'ha';

    case BA = 'ba';

    case JW = 'jw';

    case SU = 'su';

    case AUTO_DETECT = 'auto_detect';

    case ES_419 = 'es-419';
}
