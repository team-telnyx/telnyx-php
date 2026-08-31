<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Collections\Collection;
use Telnyx\AI\Collections\CollectionCreateParams;
use Telnyx\AI\Collections\CollectionEnvelope;
use Telnyx\AI\Collections\CollectionListParams;
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
}
