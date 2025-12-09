<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\PhoneNumberType;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumbersContract;

final class AvailablePhoneNumbersService implements AvailablePhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List available phone numbers
     *
     * @param array{
     *   filter?: array{
     *     administrativeArea?: string,
     *     bestEffort?: bool,
     *     countryCode?: string,
     *     excludeHeldNumbers?: bool,
     *     features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'|'hd_voice'|'international_sms'|'local_calling'|Feature>,
     *     limit?: int,
     *     locality?: string,
     *     nationalDestinationCode?: string,
     *     phoneNumber?: array{
     *       contains?: string, endsWith?: string, startsWith?: string
     *     },
     *     phoneNumberType?: 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|PhoneNumberType,
     *     quickship?: bool,
     *     rateCenter?: string,
     *     reservable?: bool,
     *   },
     * }|AvailablePhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AvailablePhoneNumberListResponse {
        [$parsed, $options] = AvailablePhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AvailablePhoneNumberListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'available_phone_numbers',
            query: $parsed,
            options: $options,
            convert: AvailablePhoneNumberListResponse::class,
        );

        return $response->parse();
    }
}
