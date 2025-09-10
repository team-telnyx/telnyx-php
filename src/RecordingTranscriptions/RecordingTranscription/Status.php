<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions\RecordingTranscription;

/**
 * The status of the recording transcription. Only `completed` has transcription text available.
 */
enum Status: string
{
    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';
}
