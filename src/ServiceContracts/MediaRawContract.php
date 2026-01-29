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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MediaRawContract
{
    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $mediaName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     * @param array<string,mixed>|MediaUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $mediaName,
        array|MediaUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MediaListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $mediaName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $mediaName uniquely identifies a media resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function download(
        string $mediaName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        array|MediaUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
