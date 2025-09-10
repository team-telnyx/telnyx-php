<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParticipantsResponse\Data;

/**
 * The status of the participant with respect to the lifecycle within the conference.
 */
enum Status: string
{
    case JOINING = 'joining';

    case JOINED = 'joined';

    case LEFT = 'left';
}
