<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
 */
enum ConferenceTrim: string
{
    case TRIM_SILENCE = 'trim-silence';

    case DO_NOT_TRIM = 'do-not-trim';
}
