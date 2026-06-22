<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\AIAssistantJoinParticipant;

/**
 * The role of the participant in the conversation.
 */
enum Role: string
{
    case USER = 'user';
}
