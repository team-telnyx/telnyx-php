<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceUpdateParticipantResponse\Data;

/**
 * Status of the participant.
 */
enum Status: string
{
    case JOINING = 'joining';

    case JOINED = 'joined';

    case LEFT = 'left';
}
