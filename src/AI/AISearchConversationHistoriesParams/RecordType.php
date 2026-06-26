<?php

declare(strict_types=1);

namespace Telnyx\AI\AISearchConversationHistoriesParams;

/**
 * The type of records to search. Each record type is stored in a separate vector index.
 */
enum RecordType: string
{
    case VOICE = 'voice';

    case MESSAGE = 'message';

    case AI_PIPELINE_STORAGE = 'ai_pipeline_storage';

    case KNOWLEDGE_BASE = 'knowledge_base';
}
