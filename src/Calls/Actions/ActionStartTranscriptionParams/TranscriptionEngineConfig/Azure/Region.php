<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Azure;

/**
 * Azure region to use for speech recognition.
 */
enum Region: string
{
    case AUSTRALIAEAST = 'australiaeast';

    case CENTRALINDIA = 'centralindia';

    case EASTUS = 'eastus';

    case NORTHCENTRALUS = 'northcentralus';

    case WESTEUROPE = 'westeurope';

    case WESTUS2 = 'westus2';
}
