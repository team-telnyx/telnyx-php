<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Collections\Collection;
use Telnyx\AI\Collections\CollectionEnvelope;
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
}
