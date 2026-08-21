<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithTeXml;

/**
 * Selects which detectors must validate a beep. `both` requires the amplitude and frequency detectors to agree. `freq_only` uses the frequency detector alone, for beeps whose volume is too unsteady for the default profile. Only used when MachineDetection is enabled.
 */
enum MachineDetectionBeepProfile: string
{
    case BOTH = 'both';

    case FREQ_ONLY = 'freq_only';
}
