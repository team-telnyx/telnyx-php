<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Collections\Collection;
use Telnyx\AI\Collections\CollectionCreateParams;
use Telnyx\AI\Collections\CollectionEnvelope;
use Telnyx\AI\Collections\CollectionGetDocumentsResponse;
use Telnyx\AI\Collections\CollectionListParams;
use Telnyx\AI\Collections\CollectionRetrieveDocumentsParams;
use Telnyx\AI\Collections\CollectionRetrieveDocumentsParams\RetrievalType;
use Telnyx\AI\Collections\CollectionUpdateParams;
use Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper;
use Telnyx\AI\Collections\Sources\SourceRequest;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\CollectionsRawContract;

/**
 * Create and manage logical collections of your Telnyx data, tune retrieval settings, manage sources, and run collection-scoped semantic search.
 *
 * @phpstan-import-type RetrievalSettingsWrapperShape from \Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
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
     * Creates a new collection scoped to your organization. Optionally attach sources and retrieval settings at creation time. If `slug` is omitted, one is derived from `name` and must be unique within your organization.
     *
     * @param array{
     *   name: string,
     *   description?: string,
     *   settings?: RetrievalSettingsWrapper|RetrievalSettingsWrapperShape,
     *   slug?: string,
     *   sources?: list<SourceRequest|SourceRequestShape>,
     * }|CollectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function create(
        array|CollectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CollectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/collections',
            body: (object) $parsed,
            options: $options,
            convert: CollectionEnvelope::class,
        );
    }

    /**
     * @api
     *
     * Fetches a single collection by its `slug`.
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/collections/slug/%1$s', $slug],
            options: $requestOptions,
            convert: CollectionEnvelope::class,
        );
    }

    /**
     * @api
     *
     * Updates a collection's metadata (`name` and/or `description`). Sources and settings are managed through their own sub-resources.
     *
     * @param string $uuid the collection's unique identifier
     * @param array{description?: string, name?: string}|CollectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function update(
        string $uuid,
        array|CollectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CollectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/collections/%1$s', $uuid],
            body: (object) $parsed,
            options: $options,
            convert: CollectionEnvelope::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of collections in your organization.
     *
     * @param array{pageNumber?: int, pageSize?: int}|CollectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Collection>>
     *
     * @throws APIException
     */
    public function list(
        array|CollectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CollectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/collections',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: Collection::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Soft-deletes a collection. Its `slug` is freed and may be reused by a new collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/collections/%1$s', $uuid],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Fetches a single collection by its `uuid`.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function retrieveByID(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/collections/%1$s', $uuid],
            options: $requestOptions,
            convert: CollectionEnvelope::class,
        );
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
     * @return BaseResponse<DefaultFlatPagination<CollectionGetDocumentsResponse>>
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
            path: ['ai/collections/%1$s/documents', $slug],
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
            page: DefaultFlatPagination::class,
        );
    }
}
