<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\RecordingSettings;

/**
 * The number of channels for the recording. 'single' for mono, 'dual' for stereo.
 */
enum Channels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
