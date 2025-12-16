<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;

interface VoicemailRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param array<string,mixed>|VoicemailCreateParams $params
     *
     * @return BaseResponse<VoicemailNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumberID,
        array|VoicemailCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     *
     * @return BaseResponse<VoicemailGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param array<string,mixed>|VoicemailUpdateParams $params
     *
     * @return BaseResponse<VoicemailUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|VoicemailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
