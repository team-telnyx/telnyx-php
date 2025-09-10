<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
 */
enum RecordingStatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
