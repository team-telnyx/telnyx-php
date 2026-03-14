<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\CallingSettingsContract;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingUpdateResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallingSettingsService implements CallingSettingsContract
{
    /**
     * @api
     */
    public CallingSettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallingSettingsRawService($client);
    }

    /**
     * @api
     *
     * Get calling settings for a phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): CallingSettingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Enable or disable Whatsapp calling for a phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        bool $enabled,
        RequestOptions|array|null $requestOptions = null,
    ): CallingSettingUpdateResponse {
        $params = Util::removeNulls(['enabled' => $enabled]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
