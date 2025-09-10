<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
 */
enum MachineDetection: string
{
    case ENABLE = 'Enable';

    case DETECT_MESSAGE_END = 'DetectMessageEnd';
}
