<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Settings\RetrievalSettings;

/**
 * Retrieval strategy. `vector` runs semantic similarity search; `hybrid` combines vector similarity with keyword matching; `keyword` runs lexical (BM25) matching.
 */
enum RetrievalType: string
{
    case VECTOR = 'vector';

    case HYBRID = 'hybrid';

    case KEYWORD = 'keyword';
}
