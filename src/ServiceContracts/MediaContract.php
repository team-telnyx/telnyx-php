<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Media\MediaGetResponse;
use Telnyx\Media\MediaListParams\Filter;
use Telnyx\Media\MediaListResponse;
use Telnyx\Media\MediaUpdateResponse;
use Telnyx\Media\MediaUploadResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MediaContract
{
    /**
     * @api
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
     * @param string $mediaURL The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     * @param int $ttlSecs The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     *
     * @throws APIException
     */
    public function update(
        string $mediaName,
        $mediaURL = omit,
        $ttlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $mediaName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MediaUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[content_type][]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): MediaListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MediaListResponse;

    /**
     * @api
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
        $mediaURL,
        $mediaName = omit,
        $ttlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaUploadResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function uploadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MediaUploadResponse;
}
