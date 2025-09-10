<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * The number of channels in the final recording. Defaults to `mono`.
 */
enum RecordingChannels: string
{
    case MONO = 'mono';

    case DUAL = 'dual';
}
