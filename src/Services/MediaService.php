<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Media\MediaGetResponse;
use Telnyx\Media\MediaListParams;
use Telnyx\Media\MediaListParams\Filter;
use Telnyx\Media\MediaListResponse;
use Telnyx\Media\MediaUpdateParams;
use Telnyx\Media\MediaUpdateResponse;
use Telnyx\Media\MediaUploadParams;
use Telnyx\Media\MediaUploadResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MediaContract;

use const Telnyx\Core\OMIT as omit;

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
     * @return MediaGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): MediaGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $mediaURL The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     * @param int $ttlSecs The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     *
     * @return MediaUpdateResponse<HasRawResponse>
     */
    public function update(
        string $mediaName,
        $mediaURL = omit,
        $ttlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaUpdateResponse {
        [$parsed, $options] = MediaUpdateParams::parseRequest(
            ['mediaURL' => $mediaURL, 'ttlSecs' => $ttlSecs],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[content_type][]
     *
     * @return MediaListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): MediaListResponse {
        [$parsed, $options] = MediaListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     */
    public function delete(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
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
     */
    public function download(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
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
     * @param string $mediaURL The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     * @param string $mediaName the unique identifier of a file
     * @param int $ttlSecs The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     *
     * @return MediaUploadResponse<HasRawResponse>
     */
    public function upload(
        $mediaURL,
        $mediaName = omit,
        $ttlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaUploadResponse {
        [$parsed, $options] = MediaUploadParams::parseRequest(
            [
                'mediaURL' => $mediaURL,
                'mediaName' => $mediaName,
                'ttlSecs' => $ttlSecs,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'media',
            body: (object) $parsed,
            options: $options,
            convert: MediaUploadResponse::class,
        );
    }
}
