<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config;

/**
 * Language to use for speech recognition with nova-3 model.
 */
enum Language: string
{
    case EN = 'en';

    case EN_US = 'en-US';

    case EN_AU = 'en-AU';

    case EN_GB = 'en-GB';

    case EN_IN = 'en-IN';

    case EN_NZ = 'en-NZ';

    case DE = 'de';

    case NL = 'nl';

    case SV = 'sv';

    case SV_SE = 'sv-SE';

    case DA = 'da';

    case DA_DK = 'da-DK';

    case ES = 'es';

    case ES_419 = 'es-419';

    case FR = 'fr';

    case FR_CA = 'fr-CA';

    case PT = 'pt';

    case PT_BR = 'pt-BR';

    case PT_PT = 'pt-PT';

    case AUTO_DETECT = 'auto_detect';
}
