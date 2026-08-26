<?php

declare(strict_types=1);

namespace Telnyx\AI\Knowledge\Collections;

use Telnyx\AI\Knowledge\Collections\CollectionRetrieveDocumentsParams\RetrievalType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Runs search over the documents in a collection, ranked by relevance to `query`. Searches currently run `vector` retrieval (semantic similarity). The collection's `retrieval_type` setting is the forward-compatible selector: `hybrid` (vector similarity fused with keyword matching) can be set but cannot be searched yet, and `keyword` (lexical BM25 matching) is not accepted yet -- setting it returns 422 `unsupported_retrieval_type`. A per-request `retrieval_type` is accepted but ignored; `meta.retrieval_type` echoes the mode that actually ran. When `query` is omitted, returns a plain catalog listing of the collection's documents.
 *
 * **How it works:**
 * 1. The `query` text is embedded into a 1024-dimensional vector using the multilingual-e5-large model.
 * 2. The embedding is compared against the collection's indexed document chunks using semantic similarity. When `hybrid` and `keyword` execution ship, those scores will be fused with, or replaced by, lexical BM25 matching.
 * 3. Results are ranked by `score` (descending) and paginated via `page[number]` / `page[size]`.
 *
 * **Authentication:** Requires a Telnyx API key via `Authorization: Bearer <key>`. Results are automatically scoped to your organization and cannot be overridden.
 *
 * **Filtering:** Use `filter[field][operator]=value` query parameters to narrow results before search. Supported operators: `eq` (default), `in`, `gte`, `gt`, `lte`, `lt`, `contains`. Metadata fields resolve to `metadata.<field>`.
 *
 * **Examples:**
 * - `GET /v2/ai/knowledge/collections/my-collection/documents?query=billing+issue&top_k=10`
 * - `GET /v2/ai/knowledge/collections/my-collection/documents?query=refund&sources=voice,message`
 * - `GET /v2/ai/knowledge/collections/my-collection/documents?query=outage&filter[record_created_at][gte]=2026-01-01T00:00:00Z`
 *
 * @see Telnyx\Services\AI\Knowledge\CollectionsService::retrieveDocuments()
 *
 * @phpstan-type CollectionRetrieveDocumentsParamsShape = array{
 *   filter?: array<string,mixed>|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   query?: string|null,
 *   retrievalType?: null|RetrievalType|value-of<RetrievalType>,
 *   sources?: string|null,
 *   topK?: int|null,
 * }
 */
final class CollectionRetrieveDocumentsParams implements BaseModel
{
    /** @use SdkModel<CollectionRetrieveDocumentsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Field filters applied before ranking, using `filter[field][operator]=value`. Supported operators: `eq` (default), `in`, `gte`, `gt`, `lte`, `lt`, `contains`. Known fields: `record_type`, `record_id`, `user_id`, `record_created_at`, `ingested_at`; any other name resolves to a `metadata.<field>` filter. Example: `filter[record_id][eq]=rec_123`.
     *
     * @var array<string,mixed>|null $filter
     */
    #[Optional(map: 'mixed')]
    public ?array $filter;

    /**
     * Page number to return (1-based). Defaults to 1.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of results per page. Defaults to 20.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Natural-language search query. When provided, the text is matched against the collection's document chunks using the collection's `retrieval_type` (vector or hybrid). When omitted, documents are returned as a plain catalog listing.
     */
    #[Optional]
    public ?string $query;

    /**
     * Reserved; not yet functional. A value supplied here is accepted but ignored — it does not override the collection's configured strategy, and it is not echoed back. Searches run `vector` retrieval, and `meta.retrieval_type` reports the mode that actually ran. To change retrieval strategy, set it on the collection's settings subresource.
     *
     * @var value-of<RetrievalType>|null $retrievalType
     */
    #[Optional(enum: RetrievalType::class)]
    public ?string $retrievalType;

    /**
     * Comma-separated list of source types to restrict the search to. When omitted, all of the collection's sources are searched.
     */
    #[Optional]
    public ?string $sources;

    /**
     * Maximum number of ranked results to consider. When omitted, the collection's configured `top_k` setting is used.
     */
    #[Optional]
    public ?int $topK;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $filter
     * @param RetrievalType|value-of<RetrievalType>|null $retrievalType
     */
    public static function with(
        ?array $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $query = null,
        RetrievalType|string|null $retrievalType = null,
        ?string $sources = null,
        ?int $topK = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $query && $self['query'] = $query;
        null !== $retrievalType && $self['retrievalType'] = $retrievalType;
        null !== $sources && $self['sources'] = $sources;
        null !== $topK && $self['topK'] = $topK;

        return $self;
    }

    /**
     * Field filters applied before ranking, using `filter[field][operator]=value`. Supported operators: `eq` (default), `in`, `gte`, `gt`, `lte`, `lt`, `contains`. Known fields: `record_type`, `record_id`, `user_id`, `record_created_at`, `ingested_at`; any other name resolves to a `metadata.<field>` filter. Example: `filter[record_id][eq]=rec_123`.
     *
     * @param array<string,mixed> $filter
     */
    public function withFilter(array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Page number to return (1-based). Defaults to 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results per page. Defaults to 20.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Natural-language search query. When provided, the text is matched against the collection's document chunks using the collection's `retrieval_type` (vector or hybrid). When omitted, documents are returned as a plain catalog listing.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Reserved; not yet functional. A value supplied here is accepted but ignored — it does not override the collection's configured strategy, and it is not echoed back. Searches run `vector` retrieval, and `meta.retrieval_type` reports the mode that actually ran. To change retrieval strategy, set it on the collection's settings subresource.
     *
     * @param RetrievalType|value-of<RetrievalType> $retrievalType
     */
    public function withRetrievalType(RetrievalType|string $retrievalType): self
    {
        $self = clone $this;
        $self['retrievalType'] = $retrievalType;

        return $self;
    }

    /**
     * Comma-separated list of source types to restrict the search to. When omitted, all of the collection's sources are searched.
     */
    public function withSources(string $sources): self
    {
        $self = clone $this;
        $self['sources'] = $sources;

        return $self;
    }

    /**
     * Maximum number of ranked results to consider. When omitted, the collection's configured `top_k` setting is used.
     */
    public function withTopK(int $topK): self
    {
        $self = clone $this;
        $self['topK'] = $topK;

        return $self;
    }
}
