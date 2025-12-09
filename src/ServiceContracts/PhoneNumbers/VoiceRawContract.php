<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams;
use Telnyx\PhoneNumbers\Voice\VoiceListResponse;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;

interface VoiceRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<VoiceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<mixed>|VoiceUpdateParams $params
     *
     * @return BaseResponse<VoiceUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VoiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|VoiceListParams $params
     *
     * @return BaseResponse<VoiceListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
