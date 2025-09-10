<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
 */
enum ConferenceStatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
