<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams\Participant;

/**
 * The role of the participant in the conversation.
 */
enum Role: string
{
    case USER = 'user';
}
