<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse;

/**
 * The reason why a conference ended. When a conference is in progress, will be null.
 */
enum ReasonConferenceEnded: string
{
    case PARTICIPANT_WITH_END_CONFERENCE_ON_EXIT_LEFT = 'participant-with-end-conference-on-exit-left';

    case LAST_PARTICIPANT_LEFT = 'last-participant-left';

    case CONFERENCE_ENDED_VIA_API = 'conference-ended-via-api';

    case TIME_EXCEEDED = 'time-exceeded';
}
