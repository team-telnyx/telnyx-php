<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Media\MediaGetResponse;
use Telnyx\Media\MediaListResponse;
use Telnyx\Media\MediaUpdateResponse;
use Telnyx\Media\MediaUploadResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MediaContract;

final class MediaService implements MediaContract
{
    /**
     * @api
     */
    public MediaRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MediaRawService($client);
    }

    /**
     * @api
     *
     * Returns the information about a stored media file.
     *
     * @param string $mediaName uniquely identifies a media resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): MediaGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($mediaName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a stored media file.
     *
     * @param string $mediaName uniquely identifies a media resource
     * @param string $mediaURL The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     * @param int $ttlSecs The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     *
     * @throws APIException
     */
    public function update(
        string $mediaName,
        ?string $mediaURL = null,
        ?int $ttlSecs = null,
        ?RequestOptions $requestOptions = null,
    ): MediaUpdateResponse {
        $params = Util::removeNulls(
            ['mediaURL' => $mediaURL, 'ttlSecs' => $ttlSecs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($mediaName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of stored media files.
     *
     * @param array{
     *   contentType?: list<string>
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[content_type][]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): MediaListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a stored media file.
     *
     * @param string $mediaName uniquely identifies a media resource
     *
     * @throws APIException
     */
    public function delete(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($mediaName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Downloads a stored media file.
     *
     * @param string $mediaName uniquely identifies a media resource
     *
     * @throws APIException
     */
    public function download(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->download($mediaName, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function upload(
        string $mediaURL,
        ?string $mediaName = null,
        ?int $ttlSecs = null,
        ?RequestOptions $requestOptions = null,
    ): MediaUploadResponse {
        $params = Util::removeNulls(
            [
                'mediaURL' => $mediaURL,
                'mediaName' => $mediaName,
                'ttlSecs' => $ttlSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
