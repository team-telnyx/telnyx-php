<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface VoicemailContract
{
    /**
     * @api
     *
     * @param bool $enabled whether voicemail is enabled
     * @param string $pin The pin used for voicemail
     *
     * @return VoicemailNewResponse<HasRawResponse>
     */
    public function create(
        string $phoneNumberID,
        $enabled = omit,
        $pin = omit,
        ?RequestOptions $requestOptions = null,
    ): VoicemailNewResponse;

    /**
     * @api
     *
     * @return VoicemailGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $phoneNumberID,
        ?RequestOptions $requestOptions = null
    ): VoicemailGetResponse;

    /**
     * @api
     *
     * @param bool $enabled whether voicemail is enabled
     * @param string $pin The pin used for voicemail
     *
     * @return VoicemailUpdateResponse<HasRawResponse>
     */
    public function update(
        string $phoneNumberID,
        $enabled = omit,
        $pin = omit,
        ?RequestOptions $requestOptions = null,
    ): VoicemailUpdateResponse;
}
