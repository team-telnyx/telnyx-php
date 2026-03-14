<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\CallingSettingsRawContract;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingUpdateParams;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingUpdateResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallingSettingsRawService implements CallingSettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get calling settings for a phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallingSettingGetResponse>
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
            path: ['v2/whatsapp/phone_numbers/%1$s/calling_settings', $phoneNumber],
            options: $requestOptions,
            convert: CallingSettingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Enable or disable Whatsapp calling for a phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array{enabled: bool}|CallingSettingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallingSettingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        array|CallingSettingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingSettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['v2/whatsapp/phone_numbers/%1$s/calling_settings', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: CallingSettingUpdateResponse::class,
        );
    }
}
