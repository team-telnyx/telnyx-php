<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoicemailContract;

/**
 * Voicemail API.
 *
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
     * Create voicemail settings for a phone number
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
    ): VoicemailNewResponse {
        $params = Util::removeNulls(['enabled' => $enabled, 'pin' => $pin]);

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
     * Update voicemail settings for a phone number
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
    ): VoicemailUpdateResponse {
        $params = Util::removeNulls(['enabled' => $enabled, 'pin' => $pin]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($phoneNumberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
