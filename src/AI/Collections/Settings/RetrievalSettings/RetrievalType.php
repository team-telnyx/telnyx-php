<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Settings\RetrievalSettings;

/**
 * Retrieval strategy. `vector` runs semantic similarity search; `hybrid` combines vector similarity with keyword matching; `keyword` runs lexical (BM25) matching. `keyword` is not accepted yet: setting it returns 422 `unsupported_retrieval_type`. A collection set to `hybrid` is accepted here but cannot be searched until hybrid execution ships.
 */
enum RetrievalType: string
{
    case VECTOR = 'vector';

    case HYBRID = 'hybrid';
}
