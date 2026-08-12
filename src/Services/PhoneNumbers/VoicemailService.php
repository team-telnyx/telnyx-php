<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams\Greeting;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoicemailContract;

/**
 * Voicemail API.
 *
 * @phpstan-import-type GreetingShape from \Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams\Greeting
 * @phpstan-import-type GreetingShape from \Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams\Greeting as GreetingShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoicemailService implements VoicemailContract
{
    /**
     * @api
     */
    public VoicemailRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoicemailRawService($client);
    }

    /**
     * @api
     *
     * Create voicemail settings for a phone number. You can also configure a custom greeting by setting the `greeting` object: use `mode` `custom_greeting` together with a `media_name` that points to an audio file uploaded through the Media Storage API, or `mode` `default` to use the standard system greeting.
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
    ): VoicemailNewResponse {
        $params = Util::removeNulls(
            ['enabled' => $enabled, 'greeting' => $greeting, 'pin' => $pin]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($phoneNumberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the voicemail settings for a phone number
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        RequestOptions|array|null $requestOptions = null
    ): VoicemailGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumberID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update voicemail settings for a phone number. You can also configure a custom greeting by setting the `greeting` object: use `mode` `custom_greeting` together with a `media_name` that points to an audio file uploaded through the Media Storage API, or `mode` `default` to use the standard system greeting.
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
    ): VoicemailUpdateResponse {
        $params = Util::removeNulls(
            ['enabled' => $enabled, 'greeting' => $greeting, 'pin' => $pin]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($phoneNumberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
