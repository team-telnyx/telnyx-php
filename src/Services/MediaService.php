<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Media\MediaGetResponse;
use Telnyx\Media\MediaListParams;
use Telnyx\Media\MediaListResponse;
use Telnyx\Media\MediaUpdateParams;
use Telnyx\Media\MediaUpdateResponse;
use Telnyx\Media\MediaUploadParams;
use Telnyx\Media\MediaUploadResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MediaContract;

final class MediaService implements MediaContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the information about a stored media file.
     *
     * @throws APIException
     */
    public function retrieve(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): MediaGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media/%1$s', $mediaName],
            options: $requestOptions,
            convert: MediaGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a stored media file.
     *
     * @param array{media_url?: string, ttl_secs?: int}|MediaUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $mediaName,
        array|MediaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaUpdateResponse {
        [$parsed, $options] = MediaUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['media/%1$s', $mediaName],
            body: (object) $parsed,
            options: $options,
            convert: MediaUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of stored media files.
     *
     * @param array{
     *   filter?: array{content_type?: list<string>}
     * }|MediaListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MediaListParams $params,
        ?RequestOptions $requestOptions = null
    ): MediaListResponse {
        [$parsed, $options] = MediaListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'media',
            query: $parsed,
            options: $options,
            convert: MediaListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a stored media file.
     *
     * @throws APIException
     */
    public function delete(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['media/%1$s', $mediaName],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Downloads a stored media file.
     *
     * @throws APIException
     */
    public function download(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media/%1$s/download', $mediaName],
            headers: ['Accept' => 'application/octet-stream'],
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Upload media file to Telnyx so it can be used with other Telnyx services
     *
     * @param array{
     *   media_url: string, media_name?: string, ttl_secs?: int
     * }|MediaUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        array|MediaUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): MediaUploadResponse {
        [$parsed, $options] = MediaUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'media',
            body: (object) $parsed,
            options: $options,
            convert: MediaUploadResponse::class,
        );
    }
}
