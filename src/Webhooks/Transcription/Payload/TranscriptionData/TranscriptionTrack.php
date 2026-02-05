<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\Transcription\Payload\TranscriptionData;

/**
 * Indicates which leg of the call has been transcribed. This is only available when `transcription_engine` is set to `B`.
 */
enum TranscriptionTrack: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
