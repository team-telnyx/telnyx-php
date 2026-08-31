<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Knowledge;

use Telnyx\AI\Knowledge\Collections\CollectionGetDocumentsResponse;
use Telnyx\AI\Knowledge\Collections\CollectionRetrieveDocumentsParams;
use Telnyx\AI\Knowledge\Collections\CollectionRetrieveDocumentsParams\RetrievalType;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Knowledge\CollectionsRawContract;

/**
 * Create and manage logical collections of your Telnyx data, tune retrieval settings, manage sources, and run collection-scoped semantic search.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CollectionsRawService implements CollectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
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
     * @param string $slug the collection's slug (unique within your organization)
     * @param array{
     *   filter?: array<string,mixed>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   query?: string,
     *   retrievalType?: RetrievalType|value-of<RetrievalType>,
     *   sources?: string,
     *   topK?: int,
     * }|CollectionRetrieveDocumentsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionGetDocumentsResponse>
     *
     * @throws APIException
     */
    public function retrieveDocuments(
        string $slug,
        array|CollectionRetrieveDocumentsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CollectionRetrieveDocumentsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/knowledge/collections/%1$s/documents', $slug],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'retrievalType' => 'retrieval_type',
                    'topK' => 'top_k',
                ],
            ),
            options: $options,
            convert: CollectionGetDocumentsResponse::class,
        );
    }
}
