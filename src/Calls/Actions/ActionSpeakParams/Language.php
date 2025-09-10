<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionSpeakParams;

/**
 * The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
 */
enum Language: string
{
    case ARB = 'arb';

    case CMN_CN = 'cmn-CN';

    case CY_GB = 'cy-GB';

    case DA_DK = 'da-DK';

    case DE_DE = 'de-DE';

    case EN_AU = 'en-AU';

    case EN_GB = 'en-GB';

    case EN_GB_WLS = 'en-GB-WLS';

    case EN_IN = 'en-IN';

    case EN_US = 'en-US';

    case ES_ES = 'es-ES';

    case ES_MX = 'es-MX';

    case ES_US = 'es-US';

    case FR_CA = 'fr-CA';

    case FR_FR = 'fr-FR';

    case HI_IN = 'hi-IN';

    case IS_IS = 'is-IS';

    case IT_IT = 'it-IT';

    case JA_JP = 'ja-JP';

    case KO_KR = 'ko-KR';

    case NB_NO = 'nb-NO';

    case NL_NL = 'nl-NL';

    case PL_PL = 'pl-PL';

    case PT_BR = 'pt-BR';

    case PT_PT = 'pt-PT';

    case RO_RO = 'ro-RO';

    case RU_RU = 'ru-RU';

    case SV_SE = 'sv-SE';

    case TR_TR = 'tr-TR';
}
