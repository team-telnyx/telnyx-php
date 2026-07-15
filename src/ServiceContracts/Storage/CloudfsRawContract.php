<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Cloudfs\CloudfCreateParams;
use Telnyx\Storage\Cloudfs\CloudfListParams;
use Telnyx\Storage\Cloudfs\CloudfListResponse;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemDetailResponseWrapper;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;
use Telnyx\Storage\Cloudfs\CloudfUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CloudfsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CloudfCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemResponseWrapper>
     *
     * @throws APIException
     */
    public function create(
        array|CloudfCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemDetailResponseWrapper>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param array<string,mixed>|CloudfUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemDetailResponseWrapper>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CloudfUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CloudfListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CloudfListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemDetailResponseWrapper>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
