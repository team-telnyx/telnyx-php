<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data;

/**
 * Current status of the insight generation for the conversation.
 */
enum Status: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
