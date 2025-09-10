<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
 */
enum ConferenceRecord: string
{
    case TRUE = 'true';

    case FALSE = 'false';

    case RECORD_FROM_START = 'record-from-start';

    case DO_NOT_RECORD = 'do-not-record';
}
