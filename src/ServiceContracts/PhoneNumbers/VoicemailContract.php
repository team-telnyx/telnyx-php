<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoicemailContract
{
    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param bool $enabled whether voicemail is enabled
     * @param string $pin The pin used for voicemail
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumberID,
        ?bool $enabled = null,
        ?string $pin = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoicemailNewResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        RequestOptions|array|null $requestOptions = null
    ): VoicemailGetResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param bool $enabled whether voicemail is enabled
     * @param string $pin The pin used for voicemail
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        ?bool $enabled = null,
        ?string $pin = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoicemailUpdateResponse;
}
