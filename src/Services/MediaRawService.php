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
use Telnyx\ServiceContracts\MediaRawContract;

final class MediaRawService implements MediaRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the information about a stored media file.
     *
     * @param string $mediaName uniquely identifies a media resource
     *
     * @return BaseResponse<MediaGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     * @param string $mediaName uniquely identifies a media resource
     * @param array{mediaURL?: string, ttlSecs?: int}|MediaUpdateParams $params
     *
     * @return BaseResponse<MediaUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $mediaName,
        array|MediaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
     * @param array{filter?: array{contentType?: list<string>}}|MediaListParams $params
     *
     * @return BaseResponse<MediaListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MediaListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     * @param string $mediaName uniquely identifies a media resource
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     * @param string $mediaName uniquely identifies a media resource
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function download(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     *   mediaURL: string, mediaName?: string, ttlSecs?: int
     * }|MediaUploadParams $params
     *
     * @return BaseResponse<MediaUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        array|MediaUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
