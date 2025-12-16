<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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

interface MediaRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     * @param array<string,mixed>|MediaUpdateParams $params
     *
     * @return BaseResponse<MediaUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $mediaName,
        array|MediaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaListParams $params
     *
     * @return BaseResponse<MediaListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MediaListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaUploadParams $params
     *
     * @return BaseResponse<MediaUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        array|MediaUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
