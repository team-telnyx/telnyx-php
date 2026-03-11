<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\ProfileRawContract;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileUpdateParams;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileUpdateResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ProfileRawService implements ProfileRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get phone number business profile
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/whatsapp/phone_numbers/%1$s/profile', $phoneNumber],
            options: $requestOptions,
            convert: ProfileGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update phone number business profile
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array{
     *   about?: string,
     *   address?: string,
     *   category?: string,
     *   description?: string,
     *   displayName?: string,
     *   email?: string,
     *   website?: string,
     * }|ProfileUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        array|ProfileUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['v2/whatsapp/phone_numbers/%1$s/profile', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: ProfileUpdateResponse::class,
        );
    }
}
