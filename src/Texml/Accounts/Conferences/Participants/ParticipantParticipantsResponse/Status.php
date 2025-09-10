<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse;

/**
 * The status of the participant's call in the conference.
 */
enum Status: string
{
    case CONNECTING = 'connecting';

    case CONNECTED = 'connected';

    case COMPLETED = 'completed';
}
