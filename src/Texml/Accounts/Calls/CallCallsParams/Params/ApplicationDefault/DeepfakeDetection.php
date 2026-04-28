<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\ApplicationDefault;

/**
 * Enables Deepfake Detection on the dialed call. When enabled, audio from the remote party is analyzed to determine whether the voice is AI-generated. Results are delivered asynchronously via a callback.
 */
enum DeepfakeDetection: string
{
    case ENABLE = 'Enable';
}
