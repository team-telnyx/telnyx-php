<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingResponseData;

/**
 * The status of the recording. Only `completed` recordings are currently supported.
 */
enum Status: string
{
    case COMPLETED = 'completed';
}
