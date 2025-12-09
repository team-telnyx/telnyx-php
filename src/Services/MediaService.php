<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
        /** @var BaseResponse<MediaGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['media/%1$s', $mediaName],
            options: $requestOptions,
            convert: MediaGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a stored media file.
     *
     * @param array{mediaURL?: string, ttlSecs?: int}|MediaUpdateParams $params
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

        /** @var BaseResponse<MediaUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['media/%1$s', $mediaName],
            body: (object) $parsed,
            options: $options,
            convert: MediaUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of stored media files.
     *
     * @param array{filter?: array{contentType?: list<string>}}|MediaListParams $params
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

        /** @var BaseResponse<MediaListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'media',
            query: $parsed,
            options: $options,
            convert: MediaListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['media/%1$s', $mediaName],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
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
        /** @var BaseResponse<string> */
        $response = $this->client->request(
            method: 'get',
            path: ['media/%1$s/download', $mediaName],
            headers: ['Accept' => 'application/octet-stream'],
            options: $requestOptions,
            convert: 'string',
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload media file to Telnyx so it can be used with other Telnyx services
     *
     * @param array{
     *   mediaURL: string, mediaName?: string, ttlSecs?: int
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

        /** @var BaseResponse<MediaUploadResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'media',
            body: (object) $parsed,
            options: $options,
            convert: MediaUploadResponse::class,
        );

        return $response->parse();
    }
}
