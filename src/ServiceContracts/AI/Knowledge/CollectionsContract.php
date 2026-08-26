<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Knowledge;

use Telnyx\AI\Knowledge\Collections\CollectionGetDocumentsResponse;
use Telnyx\AI\Knowledge\Collections\CollectionRetrieveDocumentsParams\RetrievalType;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CollectionsContract
{
    /**
     * @api
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param array<string,mixed> $filter Field filters applied before ranking, using `filter[field][operator]=value`. Supported operators: `eq` (default), `in`, `gte`, `gt`, `lte`, `lt`, `contains`. Known fields: `record_type`, `record_id`, `user_id`, `record_created_at`, `ingested_at`; any other name resolves to a `metadata.<field>` filter. Example: `filter[record_id][eq]=rec_123`.
     * @param int $pageNumber Page number to return (1-based). Defaults to 1.
     * @param int $pageSize Number of results per page. Defaults to 20.
     * @param string $query Natural-language search query. When provided, the text is matched against the collection's document chunks using the collection's `retrieval_type` (vector or hybrid). When omitted, documents are returned as a plain catalog listing.
     * @param RetrievalType|value-of<RetrievalType> $retrievalType Reserved; not yet functional. A value supplied here is accepted but ignored — it does not override the collection's configured strategy, and it is not echoed back. Searches run `vector` retrieval, and `meta.retrieval_type` reports the mode that actually ran. To change retrieval strategy, set it on the collection's settings subresource.
     * @param string $sources Comma-separated list of source types to restrict the search to. When omitted, all of the collection's sources are searched.
     * @param int $topK Maximum number of ranked results to consider. When omitted, the collection's configured `top_k` setting is used.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDocuments(
        string $slug,
        ?array $filter = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $query = null,
        RetrievalType|string|null $retrievalType = null,
        ?string $sources = null,
        ?int $topK = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionGetDocumentsResponse;
}
