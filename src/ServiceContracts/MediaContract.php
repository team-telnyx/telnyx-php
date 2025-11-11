<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Media\MediaGetResponse;
use Telnyx\Media\MediaListParams;
use Telnyx\Media\MediaListResponse;
use Telnyx\Media\MediaUpdateParams;
use Telnyx\Media\MediaUpdateResponse;
use Telnyx\Media\MediaUploadParams;
use Telnyx\Media\MediaUploadResponse;
use Telnyx\RequestOptions;

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
     * @param array<mixed>|MediaUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $mediaName,
        array|MediaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MediaListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MediaListParams $params,
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
     * @param array<mixed>|MediaUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        array|MediaUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): MediaUploadResponse;
}
