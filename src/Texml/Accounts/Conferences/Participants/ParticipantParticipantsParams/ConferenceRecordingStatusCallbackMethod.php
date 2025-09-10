<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * HTTP request type used for `ConferenceRecordingStatusCallback`. Defaults to `POST`.
 */
enum ConferenceRecordingStatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
