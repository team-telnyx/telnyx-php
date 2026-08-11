<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\CollectionRetrieveDocumentsParams;

/**
 * Override the collection's configured retrieval strategy for this request. Echoed back in `meta.retrieval_type`.
 */
enum RetrievalType: string
{
    case VECTOR = 'vector';

    case HYBRID = 'hybrid';

    case KEYWORD = 'keyword';
}
