<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;

/**
 * The status of the recording transcriptions. The transcription text will be available only when the status is completed.
 */
enum Status: string
{
    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';
}
