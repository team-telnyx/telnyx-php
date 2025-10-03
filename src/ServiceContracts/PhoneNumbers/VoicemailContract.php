<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
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
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $phoneNumberID,
        array $params,
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
     * @param bool $enabled whether voicemail is enabled
     * @param string $pin The pin used for voicemail
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        $enabled = omit,
        $pin = omit,
        ?RequestOptions $requestOptions = null,
    ): VoicemailUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $phoneNumberID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VoicemailUpdateResponse;
}
