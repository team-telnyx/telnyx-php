<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams\Greeting;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type GreetingShape from \Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams\Greeting
 * @phpstan-import-type GreetingShape from \Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams\Greeting as GreetingShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoicemailContract
{
    /**
     * @api
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param bool $enabled whether voicemail is enabled
     * @param Greeting|GreetingShape $greeting Controls the greeting a caller hears before leaving a voicemail. Set `mode` to `default` to play the standard system greeting, or to `custom_greeting` to play your own audio. When `mode` is `custom_greeting`, `media_name` is required and must reference an audio file already uploaded to your account through the Media Storage API.
     * @param string $pin The pin used for voicemail
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumberID,
        ?bool $enabled = null,
        Greeting|array|null $greeting = null,
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
     * @param \Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams\Greeting|GreetingShape1 $greeting Controls the greeting a caller hears before leaving a voicemail. Set `mode` to `default` to play the standard system greeting, or to `custom_greeting` to play your own audio. When `mode` is `custom_greeting`, `media_name` is required and must reference an audio file already uploaded to your account through the Media Storage API.
     * @param string $pin The pin used for voicemail
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        ?bool $enabled = null,
        \Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams\Greeting|array|null $greeting = null,
        ?string $pin = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoicemailUpdateResponse;
}
