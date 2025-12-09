<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailGetResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailNewResponse;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoicemailRawContract;

final class VoicemailRawService implements VoicemailRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create voicemail settings for a phone number
     *
     * @param string $phoneNumberID the ID of the phone number
     * @param array{enabled?: bool, pin?: string}|VoicemailCreateParams $params
     *
     * @return BaseResponse<VoicemailNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumberID,
        array|VoicemailCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
     * @param string $phoneNumberID the ID of the phone number
     *
     * @return BaseResponse<VoicemailGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     * @param string $phoneNumberID the ID of the phone number
     * @param array{enabled?: bool, pin?: string}|VoicemailUpdateParams $params
     *
     * @return BaseResponse<VoicemailUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|VoicemailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
