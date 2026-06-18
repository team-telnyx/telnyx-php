<?php

declare(strict_types=1);

namespace Telnyx\AI\AISearchConversationHistoriesResponse\Data;

/**
 * Type of the record.
 */
enum RecordType: string
{
    case VOICE = 'voice';

    case MESSAGE = 'message';

    case AI_PIPELINE_STORAGE = 'ai_pipeline_storage';

    case KNOWLEDGE_BASE = 'knowledge_base';
}
