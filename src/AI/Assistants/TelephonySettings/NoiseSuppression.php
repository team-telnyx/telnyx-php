<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings;

/**
 * The noise suppression engine to use. 'aicoustics' is STT-optimized and recommended for AI assistants (configure through noise_suppression_config). Use 'disabled' to turn off noise suppression.
 */
enum NoiseSuppression: string
{
    case AICOUSTICS = 'aicoustics';

    case KRISP = 'krisp';

    case DEEPFILTERNET = 'deepfilternet';

    case DISABLED = 'disabled';
}
