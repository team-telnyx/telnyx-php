<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceDesigns\VoiceDesignCreateParams;
use Telnyx\VoiceDesigns\VoiceDesignDeleteVersionParams;
use Telnyx\VoiceDesigns\VoiceDesignDownloadSampleParams;
use Telnyx\VoiceDesigns\VoiceDesignGetResponse;
use Telnyx\VoiceDesigns\VoiceDesignListParams;
use Telnyx\VoiceDesigns\VoiceDesignListResponse;
use Telnyx\VoiceDesigns\VoiceDesignNewResponse;
use Telnyx\VoiceDesigns\VoiceDesignRenameParams;
use Telnyx\VoiceDesigns\VoiceDesignRenameResponse;
use Telnyx\VoiceDesigns\VoiceDesignRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceDesignsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VoiceDesignCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDesignNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VoiceDesignCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param array<string,mixed>|VoiceDesignRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDesignGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|VoiceDesignRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VoiceDesignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VoiceDesignListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceDesignListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $version the version number to delete
     * @param array<string,mixed>|VoiceDesignDeleteVersionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $version,
        array|VoiceDesignDeleteVersionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param array<string,mixed>|VoiceDesignDownloadSampleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        array|VoiceDesignDownloadSampleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param array<string,mixed>|VoiceDesignRenameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDesignRenameResponse>
     *
     * @throws APIException
     */
    public function rename(
        string $id,
        array|VoiceDesignRenameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
