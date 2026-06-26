<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionJoinAIAssistantParams\Participant;

/**
 * Determines what happens to the conversation when this participant hangs up.
 */
enum OnHangup: string
{
    case CONTINUE_CONVERSATION = 'continue_conversation';

    case END_CONVERSATION = 'end_conversation';
}
