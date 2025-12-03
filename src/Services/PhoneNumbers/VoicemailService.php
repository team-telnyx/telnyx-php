<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoicemailContract;

final class VoicemailService implements VoicemailContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create voicemail settings for a phone number
     *
     * @param array{enabled?: bool, pin?: string}|VoicemailCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumberID,
        array|VoicemailCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VoicemailNewResponse {
        [$parsed, $options] = VoicemailCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['phone_numbers/%1$s/voicemail', $phoneNumberID],
            body: (object) $parsed,
            options: $options,
            convert: VoicemailNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the voicemail settings for a phone number
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        ?RequestOptions $requestOptions = null
    ): VoicemailGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['phone_numbers/%1$s/voicemail', $phoneNumberID],
            options: $requestOptions,
            convert: VoicemailGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update voicemail settings for a phone number
     *
     * @param array{enabled?: bool, pin?: string}|VoicemailUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|VoicemailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VoicemailUpdateResponse {
        [$parsed, $options] = VoicemailUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s/voicemail', $phoneNumberID],
            body: (object) $parsed,
            options: $options,
            convert: VoicemailUpdateResponse::class,
        );
    }
}
