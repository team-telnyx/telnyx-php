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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoicemailRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param array<string,mixed>|VoicemailCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoicemailNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumberID,
        array|VoicemailCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoicemailGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param array<string,mixed>|VoicemailUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoicemailUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|VoicemailUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
