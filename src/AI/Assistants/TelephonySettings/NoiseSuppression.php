<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings;

/**
 * The noise suppression engine to use. Use 'disabled' to turn off noise suppression.
 */
enum NoiseSuppression: string
{
    case DEEPFILTERNET = 'deepfilternet';

    case DISABLED = 'disabled';
}
