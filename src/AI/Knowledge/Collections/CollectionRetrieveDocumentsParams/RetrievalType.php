<?php

declare(strict_types=1);

namespace Telnyx\AI\Knowledge\Collections\CollectionRetrieveDocumentsParams;

/**
 * Reserved; not yet functional. A value supplied here is accepted but ignored — it does not override the collection's configured strategy, and it is not echoed back. Searches run `vector` retrieval, and `meta.retrieval_type` reports the mode that actually ran. To change retrieval strategy, set it on the collection's settings subresource.
 */
enum RetrievalType: string
{
    case VECTOR = 'vector';

    case HYBRID = 'hybrid';

    case KEYWORD = 'keyword';
}
