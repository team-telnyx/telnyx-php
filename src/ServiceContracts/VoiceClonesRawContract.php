<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams;
use Telnyx\VoiceClones\VoiceCloneCreateParams;
use Telnyx\VoiceClones\VoiceCloneListParams;
use Telnyx\VoiceClones\VoiceCloneListResponse;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse;
use Telnyx\VoiceClones\VoiceCloneNewResponse;
use Telnyx\VoiceClones\VoiceCloneUpdateParams;
use Telnyx\VoiceClones\VoiceCloneUpdateResponse;

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
     * @return BaseResponse<VoiceCloneNewResponse>
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
     * @return BaseResponse<VoiceCloneUpdateResponse>
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
     * @return BaseResponse<DefaultFlatPagination<VoiceCloneListResponse>>
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
     * @return BaseResponse<VoiceCloneNewFromUploadResponse>
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
