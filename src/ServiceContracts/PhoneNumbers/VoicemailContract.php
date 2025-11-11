<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;

interface VoicemailContract
{
    /**
     * @api
     *
     * @param array<mixed>|VoicemailCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumberID,
        array|VoicemailCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VoicemailNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        ?RequestOptions $requestOptions = null
    ): VoicemailGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|VoicemailUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|VoicemailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VoicemailUpdateResponse;
}
