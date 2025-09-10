<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
 */
enum Trim: string
{
    case TRIM_SILENCE = 'trim-silence';

    case DO_NOT_TRIM = 'do-not-trim';
}
