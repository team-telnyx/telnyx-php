<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams;
use Telnyx\VoiceClones\VoiceCloneCreateParams;
use Telnyx\VoiceClones\VoiceCloneData;
use Telnyx\VoiceClones\VoiceCloneListParams;
use Telnyx\VoiceClones\VoiceCloneResponse;
use Telnyx\VoiceClones\VoiceCloneUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceClonesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VoiceCloneCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceCloneResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VoiceCloneCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param array<string,mixed>|VoiceCloneUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceCloneResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VoiceCloneUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VoiceCloneListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VoiceCloneData>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceCloneListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
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
     * @param array<string,mixed>|VoiceCloneCreateFromUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceCloneResponse>
     *
     * @throws APIException
     */
    public function createFromUpload(
        array|VoiceCloneCreateFromUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
