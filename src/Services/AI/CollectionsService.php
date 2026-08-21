<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Collections\Collection;
use Telnyx\AI\Collections\CollectionEnvelope;
use Telnyx\AI\Collections\CollectionGetDocumentsResponse;
use Telnyx\AI\Collections\CollectionRetrieveDocumentsParams\RetrievalType;
use Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper;
use Telnyx\AI\Collections\Sources\SourceRequest;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\CollectionsContract;
use Telnyx\Services\AI\Collections\SettingsService;
use Telnyx\Services\AI\Collections\SourcesService;

/**
 * Create and manage logical collections of your Telnyx data, tune retrieval settings, manage sources, and run collection-scoped semantic search.
 *
 * @phpstan-import-type RetrievalSettingsWrapperShape from \Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CollectionsService implements CollectionsContract
{
    /**
     * @api
     */
    public CollectionsRawService $raw;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @api
     */
    public SourcesService $sources;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CollectionsRawService($client);
        $this->settings = new SettingsService($client);
        $this->sources = new SourcesService($client);
    }

    /**
     * @api
     *
     * Creates a new collection scoped to your organization. Optionally attach sources and retrieval settings at creation time. If `slug` is omitted, one is derived from `name` and must be unique within your organization.
     *
     * @param string $name human-readable collection name
     * @param string $description optional description
     * @param RetrievalSettingsWrapper|RetrievalSettingsWrapperShape $settings optional retrieval settings
     * @param string $slug Optional slug (unique per organization). Derived from `name` when omitted.
     * @param list<SourceRequest|SourceRequestShape> $sources optional sources to attach at creation time
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $description = null,
        RetrievalSettingsWrapper|array|null $settings = null,
        ?string $slug = null,
        ?array $sources = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionEnvelope {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'description' => $description,
                'settings' => $settings,
                'slug' => $slug,
                'sources' => $sources,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetches a single collection by its `slug`.
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        RequestOptions|array|null $requestOptions = null
    ): CollectionEnvelope {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($slug, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a collection's metadata (`name` and/or `description`). Sources and settings are managed through their own sub-resources.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $uuid,
        ?string $description = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionEnvelope {
        $params = Util::removeNulls(
            ['description' => $description, 'name' => $name]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($uuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of collections in your organization.
     *
     * @param int $pageNumber Page number to return (1-based). Defaults to 1.
     * @param int $pageSize Number of results per page. Defaults to 20.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Collection>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Soft-deletes a collection. Its `slug` is freed and may be reused by a new collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($uuid, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetches a single collection by its `uuid`.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveByID(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): CollectionEnvelope {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveByID($uuid, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Runs search over the documents in a collection, ranked by relevance to `query`. The collection's `retrieval_type` setting selects the strategy: `vector` (semantic similarity), `hybrid` (vector similarity fused with keyword matching), or `keyword` (lexical BM25 matching). When `query` is omitted, returns a plain catalog listing of the collection's documents.
     *
     * **How it works:**
     * 1. For `vector` and `hybrid`, the `query` text is embedded into a 1024-dimensional vector using the multilingual-e5-large model.
     * 2. For `vector`, the embedding is compared against the collection's indexed document chunks using semantic similarity; for `hybrid`, those similarity scores are fused with keyword-match scores; for `keyword`, only lexical BM25 matching is applied.
     * 3. Results are ranked by `score` (descending) and paginated via `page[number]` / `page[size]`.
     *
     * **Authentication:** Requires a Telnyx API key via `Authorization: Bearer <key>`. Results are automatically scoped to your organization and cannot be overridden.
     *
     * **Filtering:** Use `filter[field][operator]=value` query parameters to narrow results before search. Supported operators: `eq` (default), `in`, `gte`, `gt`, `lte`, `lt`, `contains`. Metadata fields resolve to `metadata.<field>`.
     *
     * **Examples:**
     * - `GET /v2/ai/collections/my-collection/documents?query=billing+issue&top_k=10`
     * - `GET /v2/ai/collections/my-collection/documents?query=refund&sources=voice,message`
     * - `GET /v2/ai/collections/my-collection/documents?query=outage&filter[record_created_at][gte]=2026-01-01T00:00:00Z`
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param array<string,mixed> $filter Field filters applied before ranking, using `filter[field][operator]=value`. Supported operators: `eq` (default), `in`, `gte`, `gt`, `lte`, `lt`, `contains`. Known fields: `record_type`, `record_id`, `user_id`, `record_created_at`, `ingested_at`; any other name resolves to a `metadata.<field>` filter. Example: `filter[record_id][eq]=rec_123`.
     * @param int $pageNumber Page number to return (1-based). Defaults to 1.
     * @param int $pageSize Number of results per page. Defaults to 20.
     * @param string $query Natural-language search query. When provided, the text is matched against the collection's document chunks using the collection's `retrieval_type` (vector or hybrid). When omitted, documents are returned as a plain catalog listing.
     * @param RetrievalType|value-of<RetrievalType> $retrievalType Override the collection's configured retrieval strategy for this request. Echoed back in `meta.retrieval_type`.
     * @param string $sources Comma-separated list of source types to restrict the search to. When omitted, all of the collection's sources are searched.
     * @param int $topK Maximum number of ranked results to consider. When omitted, the collection's configured `top_k` setting is used.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<CollectionGetDocumentsResponse>
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'query' => $query,
                'retrievalType' => $retrievalType,
                'sources' => $sources,
                'topK' => $topK,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveDocuments($slug, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
