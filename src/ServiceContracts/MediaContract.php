<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Media\MediaGetResponse;
use Telnyx\Media\MediaListResponse;
use Telnyx\Media\MediaUpdateResponse;
use Telnyx\Media\MediaUploadResponse;
use Telnyx\RequestOptions;

interface MediaContract
{
    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): MediaGetResponse;

    /**
     * @api
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
    ): MediaUpdateResponse;

    /**
     * @api
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
    ): MediaListResponse;

    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     *
     * @throws APIException
     */
    public function delete(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     *
     * @throws APIException
     */
    public function download(
        string $mediaName,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
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
    ): MediaUploadResponse;
}
