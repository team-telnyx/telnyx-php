<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Collections\Collection;
use Telnyx\AI\Collections\CollectionEnvelope;
use Telnyx\AI\Collections\CollectionGetDocumentsResponse;
use Telnyx\AI\Collections\CollectionRetrieveDocumentsParams\RetrievalType;
use Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper;
use Telnyx\AI\Collections\Sources\SourceRequest;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RetrievalSettingsWrapperShape from \Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CollectionsContract
{
    /**
     * @api
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
    ): CollectionEnvelope;

    /**
     * @api
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        RequestOptions|array|null $requestOptions = null
    ): CollectionEnvelope;

    /**
     * @api
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
    ): CollectionEnvelope;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveByID(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): CollectionEnvelope;

    /**
     * @api
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
    ): DefaultFlatPagination;
}
