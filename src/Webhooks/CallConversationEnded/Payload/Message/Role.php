<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEnded\Payload\Message;

/**
 * The author of the message. `tool`, `system`, and `developer` only appear when `conversation_ended_full_history` is enabled. `system` and `developer` entries are informational (for example idle check-ins, voicemail prompts, participant-left notices, or messages added through the API); their wording is not a stable contract.
 */
enum Role: string
{
    case USER = 'user';

    case ASSISTANT = 'assistant';

    case TOOL = 'tool';

    case SYSTEM = 'system';

    case DEVELOPER = 'developer';
}
