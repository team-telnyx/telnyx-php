<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Collections;

use Telnyx\AI\Collections\Sources\SourceCreateParams;
use Telnyx\AI\Collections\Sources\SourceDeleteParams;
use Telnyx\AI\Collections\Sources\SourceListResponse;
use Telnyx\AI\Collections\Sources\SourceNewResponse;
use Telnyx\AI\Collections\Sources\SourceReplaceParams;
use Telnyx\AI\Collections\Sources\SourceReplaceResponse;
use Telnyx\AI\Collections\Sources\SourceRequest;
use Telnyx\AI\Collections\Sources\SourceType;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Collections\SourcesRawContract;

/**
 * Create and manage logical collections of your Telnyx data, tune retrieval settings, manage sources, and run collection-scoped semantic search.
 *
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SourcesRawService implements SourcesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Attaches a new content source to the specified collection and returns the created source. The source's content is ingested and embedded so it becomes searchable within the collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param array{
     *   sourceType: SourceType|value-of<SourceType>, bucketID?: string
     * }|SourceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $uuid,
        array|SourceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/collections/%1$s/sources', $uuid],
            body: (object) $parsed,
            options: $options,
            convert: SourceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the sources attached to a collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/collections/%1$s/sources', $uuid],
            options: $requestOptions,
            convert: SourceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes a single source from a collection.
     *
     * @param string $sourceID the identifier of the source to remove
     * @param array{uuid: string}|SourceDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $sourceID,
        array|SourceDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $uuid = $parsed['uuid'];
        unset($parsed['uuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/collections/%1$s/sources/%2$s', $uuid, $sourceID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Replaces the collection's entire source set. The response `meta` reports which sources were added, retained, and removed.
     *
     * @param string $uuid the collection's unique identifier
     * @param array{
     *   sources: list<SourceRequest|SourceRequestShape>
     * }|SourceReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceReplaceResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $uuid,
        array|SourceReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/collections/%1$s/sources', $uuid],
            body: (object) $parsed,
            options: $options,
            convert: SourceReplaceResponse::class,
        );
    }
}
