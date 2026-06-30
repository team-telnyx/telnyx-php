<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineSpeechmaticsConfig;

/**
 * Language to use for speech recognition.
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
}
